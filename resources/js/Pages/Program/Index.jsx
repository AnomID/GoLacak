import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";

const ProgramIndex = ({ programs, bulan }) => {
    const handleDelete = (id) => {
        if (confirm("Are you sure you want to delete this program?")) {
            Inertia.delete(route("program.destroy", id));
        }
    };

    return (
        <div>
            <h1>Programs for {bulan.bulan}</h1>
            <Link
                href={route("program.create", bulan.id)}
                className="btn btn-primary"
            >
                Add Program
            </Link>
            <table>
                <thead>
                    <tr>
                        <th>Nama Program</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {programs.length > 0 ? (
                        programs.map((program) => (
                            <tr key={program.id}>
                                <td>
                                    {/* Mengklik nama program akan mengarah ke halaman kegiatan */}
                                    <Link
                                        href={route(
                                            "kegiatan.index",
                                            program.id
                                        )}
                                    >
                                        {program.nama_program}
                                    </Link>
                                </td>
                                <td>
                                    <Link
                                        href={route("program.edit", program.id)}
                                        className="btn btn-sm btn-warning"
                                    >
                                        Edit
                                    </Link>
                                    <button
                                        onClick={() => handleDelete(program.id)}
                                        className="btn btn-sm btn-danger"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        ))
                    ) : (
                        <tr>
                            <td colSpan="2">
                                No programs available for this month.
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </div>
    );
};

export default ProgramIndex;
