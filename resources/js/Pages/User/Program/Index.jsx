import React from "react";
import { Link } from "@inertiajs/inertia-react";

const ProgramIndex = ({ programs, bulan }) => {
    return (
        <div>
            <h1>Programs for {bulan.bulan}</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nama Program</th>
                        <th>Anggaran Murni</th>
                        <th>Pergeseran</th>
                        <th>Perubahan</th>
                        <th>Penyerapan Anggaran</th>
                        <th>Persen Penyerapan Anggaran</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {programs.length > 0 ? (
                        programs.map((program) => (
                            <tr key={program.id}>
                                <td>{program.nama_program}</td>
                                <td>{program.anggaran_murni}</td>
                                <td>{program.pergeseran}</td>
                                <td>{program.perubahan}</td>
                                <td>{program.penyerapan_anggaran}</td>
                                <td>{program.persen_penyerapan_anggaran}</td>

                                <td>
                                    <Link
                                        href={route(
                                            "user.program.edit-anggaran",
                                            program.id
                                        )}
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
                            <td colSpan="7">
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
