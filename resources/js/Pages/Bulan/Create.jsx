import React, { useState } from "react";
import { useForm, Link } from "@inertiajs/react";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import { format } from "date-fns";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

const BulanCreate = ({ auth }) => {
    const [startDate, setStartDate] = useState(new Date());
    const { data, setData, post, errors } = useForm({
        bulan: format(startDate, "MMMM yyyy"), // Default format "September 2024"
    });

    const handleDateChange = (date) => {
        setStartDate(date);
        setData("bulan", format(date, "MMMM yyyy"));
    };

    const submit = (e) => {
        e.preventDefault();
        post(route("admin.bulan.store")); // Use correct route name
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <h1 className="text-xl sm:text-2xl font-bold mb-6 text-[#384B70]">
                    Tambah Data Bulan
                </h1>
                <form
                    onSubmit={submit}
                    className="bg-white p-4 sm:p-6 rounded-lg shadow-md"
                >
                    <div className="mb-4">
                        <label className="block text-[#384B70] font-semibold mb-2">
                            Bulan
                        </label>
                        <DatePicker
                            selected={startDate}
                            onChange={handleDateChange}
                            dateFormat="MMMM yyyy"
                            showMonthYearPicker
                            className="border border-gray-300 rounded-md py-2 px-3 w-full"
                        />
                        {errors.bulan && (
                            <div className="text-red-600 text-sm mt-2">
                                {errors.bulan}
                            </div>
                        )}
                    </div>
                    <div className="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                        <button
                            type="submit"
                            className="bg-[#B8001F] text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300 w-full sm:w-auto"
                        >
                            Simpan
                        </button>
                        <Link
                            href={route("admin.bulan.index")}
                            className="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition duration-300 w-full sm:w-auto"
                        >
                            Batal
                        </Link>
                    </div>
                </form>
            </div>
        </AuthenticatedLayout>
    );
};

export default BulanCreate;
