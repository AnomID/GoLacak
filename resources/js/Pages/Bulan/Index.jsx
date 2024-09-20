import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";

const BulanIndex = ({ bulan }) => {
    const handleDelete = (id) => {
        if (confirm("Are you sure you want to delete this month?")) {
            Inertia.delete(route("bulan.destroy", id)); // Menggunakan Inertia untuk delete
        }
    };

    return (
        <div>
            <h1>Bulan</h1>
            <table>
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {bulan.map((item) => (
                        <tr key={item.id}>
                            <td>
                                <Link href={route("program.index", item.id)}>
                                    {item.bulan}
                                </Link>
                            </td>
                            <td>
                                <Link
                                    href={route("bulan.edit", item.id)}
                                    className="btn btn-sm btn-warning"
                                >
                                    Edit
                                </Link>
                                <button
                                    onClick={() => handleDelete(item.id)} // Panggil handleDelete
                                    className="btn btn-sm btn-danger"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default BulanIndex;
