import React, { useState } from "react";
import { Link } from "@inertiajs/inertia-react";

const AllMonthsShow = ({ bulan }) => {
    // State to manage open/close status for each month
    const [openMonth, setOpenMonth] = useState({});

    // Toggle the visibility of months
    const toggleMonth = (id) => {
        setOpenMonth((prevState) => ({
            ...prevState,
            [id]: !prevState[id],
        }));
    };

    return (
        <div>
            <h1>All Bulan Data</h1>

            {/* Display Each Month */}
            {bulan.map((month) => (
                <div key={month.id} style={{ marginBottom: "20px" }}>
                    {/* Month Header */}
                    <h2
                        onClick={() => toggleMonth(month.id)}
                        style={{
                            cursor: "pointer",
                            background: "#f0f0f0",
                            padding: "10px",
                            borderRadius: "5px",
                        }}
                    >
                        {openMonth[month.id] ? "▼" : "▶"} Bulan: {month.bulan}
                    </h2>

                    {/* Month Details */}
                    {openMonth[month.id] && (
                        <div style={{ paddingLeft: "20px" }}>
                            {/* Display Programs */}
                            {month.programs.map((program) => (
                                <div
                                    key={program.id}
                                    style={{ marginBottom: "15px" }}
                                >
                                    <h3>{program.nama_program}</h3>
                                    <p>Indikator: {program.nama_indikator}</p>
                                    <p>
                                        Jumlah Indikator:{" "}
                                        {program.jumlah_indikator}
                                    </p>
                                    <p>
                                        Tipe Indikator: {program.tipe_indikator}
                                    </p>
                                    <p>
                                        Anggaran Murni: {program.anggaran_murni}
                                    </p>
                                    <p>Pergeseran: {program.pergeseran}</p>
                                    <p>Perubahan: {program.perubahan}</p>
                                    <p>
                                        Penyerapan Anggaran:{" "}
                                        {program.penyerapan_anggaran}
                                    </p>
                                    <p>
                                        Persen Penyerapan:{" "}
                                        {program.persen_penyerapan_anggaran}%
                                    </p>

                                    {/* Display Activities */}
                                    {program.kegiatans.map((kegiatan) => (
                                        <div
                                            key={kegiatan.id}
                                            style={{ marginLeft: "20px" }}
                                        >
                                            <h4>
                                                Kegiatan:{" "}
                                                {kegiatan.nama_kegiatan}
                                            </h4>
                                            <p>
                                                Indikator:{" "}
                                                {kegiatan.nama_indikator}
                                            </p>
                                            <p>
                                                Jumlah Indikator:{" "}
                                                {kegiatan.jumlah_indikator}
                                            </p>
                                            <p>
                                                Tipe Indikator:{" "}
                                                {kegiatan.tipe_indikator}
                                            </p>
                                            <p>
                                                Anggaran Murni:{" "}
                                                {kegiatan.anggaran_murni}
                                            </p>
                                            <p>
                                                Pergeseran:{" "}
                                                {kegiatan.pergeseran}
                                            </p>
                                            <p>
                                                Perubahan: {kegiatan.perubahan}
                                            </p>
                                            <p>
                                                Penyerapan Anggaran:{" "}
                                                {kegiatan.penyerapan_anggaran}
                                            </p>
                                            <p>
                                                Persen Penyerapan:{" "}
                                                {
                                                    kegiatan.persen_penyerapan_anggaran
                                                }
                                                %
                                            </p>

                                            {/* Display Sub-Activities */}
                                            {kegiatan.subKegiatans.map(
                                                (subKegiatan) => (
                                                    <div
                                                        key={subKegiatan.id}
                                                        style={{
                                                            marginLeft: "20px",
                                                        }}
                                                    >
                                                        <h5>
                                                            Sub-Kegiatan:{" "}
                                                            {
                                                                subKegiatan.nama_sub_kegiatan
                                                            }
                                                        </h5>
                                                        <p>
                                                            Indikator:{" "}
                                                            {
                                                                subKegiatan.nama_indikator
                                                            }
                                                        </p>
                                                        <p>
                                                            Jumlah Indikator:{" "}
                                                            {
                                                                subKegiatan.jumlah_indikator
                                                            }
                                                        </p>
                                                        <p>
                                                            Tipe Indikator:{" "}
                                                            {
                                                                subKegiatan.tipe_indikator
                                                            }
                                                        </p>
                                                        <p>
                                                            Anggaran Murni:{" "}
                                                            {
                                                                subKegiatan.anggaran_murni
                                                            }
                                                        </p>
                                                        <p>
                                                            Pergeseran:{" "}
                                                            {
                                                                subKegiatan.pergeseran
                                                            }
                                                        </p>
                                                        <p>
                                                            Perubahan:{" "}
                                                            {
                                                                subKegiatan.perubahan
                                                            }
                                                        </p>
                                                        <p>
                                                            Penyerapan Anggaran:{" "}
                                                            {
                                                                subKegiatan.penyerapan_anggaran
                                                            }
                                                        </p>
                                                        <p>
                                                            Persen Penyerapan:{" "}
                                                            {
                                                                subKegiatan.persen_penyerapan_anggaran
                                                            }
                                                            %
                                                        </p>
                                                    </div>
                                                )
                                            )}
                                        </div>
                                    ))}
                                </div>
                            ))}
                        </div>
                    )}
                </div>
            ))}

            {/* Back Button */}
            <Link
                href={route("admin.bulan.index")}
                className="btn btn-sm btn-secondary"
            >
                Back to List
            </Link>
        </div>
    );
};

export default AllMonthsShow;
