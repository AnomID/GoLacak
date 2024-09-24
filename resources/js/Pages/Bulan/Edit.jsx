import React, { useState } from "react";
import { useForm, Link } from "@inertiajs/react";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import { format, parse } from "date-fns";

const BulanEdit = ({ bulan }) => {
    // Parsing format yang ada di database
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
        <div>
            <h1>Edit Bulan</h1>
            <form onSubmit={submit}>
                <div>
                    <label>Bulan</label>
                    {/* Menggunakan DatePicker dengan format MMMM yyyy */}
                    <DatePicker
                        selected={startDate}
                        onChange={(date) => handleDateChange(date)}
                        dateFormat="MMMM yyyy" // Format tampilan
                        showMonthYearPicker // Menampilkan hanya bulan dan tahun
                    />
                    {errors.bulan && <div>{errors.bulan}</div>}
                </div>
                <button type="submit">Submit</button>
                <Link href={route("admin.bulan.index")}>Cancel</Link>
            </form>
        </div>
    );
};

export default BulanEdit;
