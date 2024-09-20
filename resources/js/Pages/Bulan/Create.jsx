import React, { useState } from "react";
import { useForm, Link } from "@inertiajs/react";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import { format } from "date-fns";

const BulanCreate = () => {
    const [startDate, setStartDate] = useState(new Date());
    const { data, setData, post, errors } = useForm({
        bulan: format(startDate, "MMMM yyyy"), // Default format "September 2024"
    });

    const handleDateChange = (date) => {
        setStartDate(date);
        setData("bulan", format(date, "MMMM yyyy")); // Format bulan dan tahun
    };

    const submit = (e) => {
        e.preventDefault();
        post(route("bulan.store"));
    };

    return (
        <div>
            <h1>Create Bulan</h1>
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
                <Link href={route("bulan.index")}>Cancel</Link>
            </form>
        </div>
    );
};

export default BulanCreate;
