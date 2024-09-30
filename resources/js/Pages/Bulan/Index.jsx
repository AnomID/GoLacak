import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";

const BulanIndex = ({ bulan }) => {
    const handleDelete = (id) => {
        if (confirm("Are you sure you want to delete this month?")) {
            Inertia.delete(route("admin.bulan.destroy", id)); // Menggunakan Inertia untuk delete
        }
    };

    return (
        <div>
            <h1>Bulan</h1>

            {/* Add buttons for adding a month and viewing all months */}
            <div style={{ marginBottom: "20px" }}>
                <Link
                    href={route("admin.bulan.create")}
                    className="btn btn-sm btn-primary"
                >
                    Add Bulan
                </Link>
                {/* <Link
                    href={route("admin.bulan.index")}
                    className="btn btn-sm btn-secondary"
                    style={{ marginLeft: "10px" }}
                >
                    View All Months
                </Link> */}
            </div>

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
                            <td>{item.bulan}</td>
                            <td>
                                <Link href={route("program.index", item.id)}>
                                    View
                                </Link>
                                <Link
                                    href={route("admin.bulan.edit", item.id)}
                                    className="btn btn-sm btn-warning"
                                >
                                    Edit
                                </Link>
                                <button
                                    onClick={() => handleDelete(item.id)}
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
