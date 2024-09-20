import React from "react";
import { useForm } from "@inertiajs/react";

export default function BulanCreate() {
    const { data, setData, post } = useForm({
        bulan: "",
    });

    const submit = (e) => {
        e.preventDefault();
        post("/bulan");
    };

    return (
        <div>
            <h1>Tambah Bulan</h1>
            <form onSubmit={submit}>
                <div>
                    <label htmlFor="bulan">Bulan</label>
                    <input
                        type="date"
                        value={data.bulan}
                        onChange={(e) => setData("bulan", e.target.value)}
                    />
                </div>
                <button type="submit">Simpan</button>
            </form>
        </div>
    );
}
