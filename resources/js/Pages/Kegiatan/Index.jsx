import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";

const IndexKegiatan = ({ kegiatan, program }) => {
    const handleDelete = (id) => {
        if (confirm("Are you sure you want to delete this kegiatan?")) {
            Inertia.delete(route("kegiatan.destroy", id));
        }
    };

    return (
        <div>
            <h1>Kegiatan for {program.nama_program}</h1>
            <Link
                href={route("kegiatan.create", program.id)}
                className="btn btn-primary"
            >
                Add Kegiatan
            </Link>
            <table>
                <thead>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {kegiatan.length > 0 ? (
                        kegiatan.map((kegiatanItem) => (
                            <tr key={kegiatanItem.id}>
                                <td>
                                    {/* Mengklik nama kegiatan akan mengarah ke halaman Sub Kegiatan */}
                                    <Link
                                        href={route(
                                            "subkegiatan.index",
                                            kegiatanItem.id
                                        )}
                                    >
                                        {kegiatanItem.nama_kegiatan}
                                    </Link>
                                </td>
                                <td>
                                    <Link
                                        href={route(
                                            "kegiatan.edit",
                                            kegiatanItem.id
                                        )}
                                        className="btn btn-sm btn-warning"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        onClick={() =>
                                            handleDelete(kegiatanItem.id)
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
                            <td colSpan="2">No kegiatan available.</td>
                        </tr>
                    )}
                </tbody>
            </table>
        </div>
    );
};

export default IndexKegiatan;
