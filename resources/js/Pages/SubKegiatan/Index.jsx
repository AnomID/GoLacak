import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";

const IndexSubKegiatan = ({ subKegiatan, kegiatan }) => {
    const handleDelete = (id) => {
        if (confirm("Are you sure you want to delete this sub kegiatan?")) {
            Inertia.delete(route("subkegiatan.destroy", id));
        }
    };

    return (
        <div>
            <h1>Sub Kegiatan for {kegiatan.nama_kegiatan}</h1>
            <Link
                href={route("subkegiatan.create", kegiatan.id)}
                className="btn btn-primary"
            >
                Add Sub Kegiatan
            </Link>
            <table>
                <thead>
                    <tr>
                        <th>Nama Sub Kegiatan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {subKegiatan.length > 0 ? (
                        subKegiatan.map((sub) => (
                            <tr key={sub.id}>
                                <td>{sub.nama_sub_kegiatan}</td>
                                <td>
                                    <Link
                                        href={route("subkegiatan.edit", sub.id)}
                                        className="btn btn-sm btn-warning"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        onClick={() => handleDelete(sub.id)}
                                        className="btn btn-sm btn-danger"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        ))
                    ) : (
                        <tr>
                            <td colSpan="2">No sub kegiatan available.</td>
                        </tr>
                    )}
                </tbody>
            </table>
        </div>
    );
};

export default IndexSubKegiatan;
