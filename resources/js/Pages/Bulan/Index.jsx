import React from "react";
import { Link, usePage } from "@inertiajs/react";

export default function BulanIndex() {
    const { bulan } = usePage().props;

    return (
        <div>
            <h1>Daftar Bulan</h1>
            <Link href="/bulan/create" className="btn btn-primary">
                Tambah Bulan
            </Link>
            <ul>
                {bulan.map((item) => (
                    <li key={item.id}>
                        {item.bulan}
                        <Link href={`/bulan/${item.id}/edit`}>Edit</Link>
                        <form
                            action={`/bulan/${item.id}`}
                            method="POST"
                            style={{ display: "inline-block" }}
                        >
                            <input
                                type="hidden"
                                name="_method"
                                value="DELETE"
                            />
                            <button type="submit" className="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </li>
                ))}
            </ul>
        </div>
    );
}
