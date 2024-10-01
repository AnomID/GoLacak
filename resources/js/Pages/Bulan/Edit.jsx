import React, { useState } from "react";
import { useForm, Link } from "@inertiajs/react";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import { format, parse } from "date-fns";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

const BulanEdit = ({ bulan, auth }) => {
    const [startDate, setStartDate] = useState(
        parse(bulan.bulan, "MMMM yyyy", new Date())
    );
    const { data, setData, put, errors } = useForm({
        bulan: bulan.bulan || "",
    });

    const handleDateChange = (date) => {
        setStartDate(date);
        setData("bulan", format(date, "MMMM yyyy")); // Format bulan dan tahun
    };

    const submit = (e) => {
        e.preventDefault();
        put(route("admin.bulan.update", bulan.id));
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <h1 className="text-2xl font-bold mb-6 text-[#384B70]">
                    Edit Bulan
                </h1>
                <form
                    onSubmit={submit}
                    className="bg-white p-6 rounded-lg shadow-md"
                >
                    <div className="mb-4">
                        <label className="block text-[#384B70] font-semibold mb-2">
                            Bulan
                        </label>
                        <DatePicker
                            selected={startDate}
                            onChange={handleDateChange}
                            dateFormat="MMMM yyyy" // Format tampilan
                            showMonthYearPicker // Menampilkan hanya bulan dan tahun
                            className="border border-gray-300 rounded-md py-2 px-4 w-full"
                        />
                        {errors.bulan && (
                            <div className="text-red-600 mt-2">
                                {errors.bulan}
                            </div>
                        )}
                    </div>
                    <div className="flex space-x-2">
                        <button
                            type="submit"
                            className="bg-[#B8001F] text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300"
                        >
                            Submit
                        </button>
                        <Link
                            href={route("admin.bulan.index")}
                            className="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition duration-300"
                        >
                            Cancel
                        </Link>
                    </div>
                </form>
            </div>
        </AuthenticatedLayout>
    );
};

export default BulanEdit;
