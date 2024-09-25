import React from "react";
import { Link } from "@inertiajs/react";

const SubKegiatanIndex = ({ subkegiatan, kegiatan }) => {
    return (
        <div>
            <h1>Sub Kegiatan for Kegiatan: {kegiatan.nama_kegiatan}</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nama Sub Kegiatan</th>
                        <th>Anggaran Murni</th>
                        <th>Pergeseran</th>
                        <th>Perubahan</th>
                        <th>Penyerapan Anggaran</th>
                        <th>Persen Penyerapan Anggaran</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {subkegiatan.length > 0 ? (
                        subkegiatan.map((subKeg) => (
                            <tr key={subKeg.id}>
                                <td>{subKeg.nama_sub_kegiatan}</td>
                                <td>{subKeg.anggaran_murni}</td>
                                <td>{subKeg.pergeseran}</td>
                                <td>{subKeg.perubahan}</td>
                                <td>{subKeg.penyerapan_anggaran}</td>
                                <td>{subKeg.persen_penyerapan_anggaran}</td>
                                <td>
                                    <Link
                                        href={route(
                                            "user.subkegiatan.edit-anggaran",
                                            subKeg.id
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
                                No sub kegiatan available for this kegiatan.
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </div>
    );
};

export default SubKegiatanIndex;
