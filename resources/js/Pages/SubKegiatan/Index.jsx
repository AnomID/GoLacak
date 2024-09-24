import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";

const IndexSubKegiatan = ({ subkegiatan, kegiatan }) => {
    const handleDelete = (id) => {
        if (confirm("Are you sure you want to delete this sub kegiatan?")) {
            Inertia.delete(
                route("subkegiatan.destroy", {
                    kegiatan: kegiatan.id,
                    subkegiatan: id,
                })
            );
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
                    {subkegiatan.length > 0 ? (
                        subkegiatan.map((subkegiatanItem) => (
                            <tr key={subkegiatanItem.id}>
                                <td>{subkegiatanItem.nama_subkegiatan}</td>
                                <td>
                                    <Link
                                        href={route("subkegiatan.edit", {
                                            kegiatan: kegiatan.id,
                                            subkegiatan: subkegiatanItem.id,
                                        })}
                                        className="btn btn-sm btn-warning"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        onClick={() =>
                                            handleDelete(subkegiatanItem.id)
                                        }
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
