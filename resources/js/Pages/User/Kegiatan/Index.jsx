import React from "react";
import { Link } from "@inertiajs/react";

const KegiatanIndex = ({ kegiatan, program }) => {
    return (
        <div>
            <h1>Kegiatan for Program: {program.nama_program}</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Anggaran Murni</th>
                        <th>Pergeseran</th>
                        <th>Perubahan</th>
                        <th>Penyerapan Anggaran</th>
                        <th>Persen Penyerapan Anggaran</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {kegiatan.length > 0 ? (
                        kegiatan.map((keg) => (
                            <tr key={keg.id}>
                                <td>
                                    <Link
                                        href={route(
                                            "user.subkegiatan.index",
                                            keg.id
                                        )}
                                    >
                                        {keg.nama_kegiatan}
                                    </Link>
                                </td>{" "}
                                <td>{keg.anggaran_murni}</td>
                                <td>{keg.pergeseran}</td>
                                <td>{keg.perubahan}</td>
                                <td>{keg.penyerapan_anggaran}</td>
                                <td>{keg.persen_penyerapan_anggaran}</td>
                                <td>
                                    <Link
                                        href={route(
                                            "user.kegiatan.edit-anggaran",
                                            keg.id
                                        )}
                                        className="btn btn-sm btn-primary"
                                    >
                                        Update Anggaran
                                    </Link>
                                </td>
                            </tr>
                        ))
                    ) : (
                        <tr>
                            <td colSpan="7">
                                No kegiatan available for this program.
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </div>
    );
};

export default KegiatanIndex;
