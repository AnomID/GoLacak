import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";

const BulanIndex = ({ bulan }) => {
    // Function to handle deletion of a month
    const handleDelete = (id) => {
        if (confirm("Are you sure you want to delete this month?")) {
            Inertia.delete(route("admin.bulan.destroy", id)); // Use Inertia for delete
        }
    };

    return (
        <div>
            <h1>Bulan</h1>

            {/* Add "Add Bulan" button */}
            <div style={{ marginBottom: "20px" }}>
                <Link
                    href={route("admin.bulan.create")}
                    className="btn btn-sm btn-primary"
                >
                    Add Bulan
                </Link>
            </div>

            {/* Display the list of months */}
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
                                {/* View Details Button */}
                                <Link
                                    href={route("admin.bulan.show", item.id)} // View details route
                                    className="btn btn-sm btn-info"
                                    style={{ marginRight: "5px" }}
                                >
                                    View Details
                                </Link>

                                {/* Link to Programs Page */}
                                <Link
                                    href={route("program.index", item.id)}
                                    className="btn btn-sm btn-secondary"
                                    style={{ marginRight: "5px" }}
                                >
                                    View Programs
                                </Link>

                                {/* Edit Button */}
                                <Link
                                    href={route("admin.bulan.edit", item.id)}
                                    className="btn btn-sm btn-warning"
                                    style={{ marginRight: "5px" }}
                                >
                                    Edit
                                </Link>

                                {/* Delete Button */}
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
