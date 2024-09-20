import React from "react";
import { useForm } from "@inertiajs/react";

export default function BulanEdit({ bulan }) {
    const { data, setData, put } = useForm({
        bulan: bulan.bulan || "",
    });

    const submit = (e) => {
        e.preventDefault();
        put(`/bulan/${bulan.id}`);
    };

    return (
        <div>
            <h1>Edit Bulan</h1>
            <form onSubmit={submit}>
                <div>
                    <label htmlFor="bulan">Bulan</label>
                    <input
                        type="date"
                        value={data.bulan}
                        onChange={(e) => setData("bulan", e.target.value)}
                    />
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    );
}
