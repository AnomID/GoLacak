import React from "react";
import { Link } from "@inertiajs/inertia-react";

const BulanDetail = ({ bulan }) => {
    return (
        <div>
            <h1>Detail Bulan</h1>
            <Link
                href={route("user.bulan.index")}
                className="btn btn-sm btn-secondary"
            >
                Back to Bulan List
            </Link>

            {/* Display each bulan with its programs, kegiatan, and sub-kegiatan */}
            {bulan.map((item) => (
                <div
                    key={item.id}
                    style={{
                        marginTop: "20px",
                        border: "1px solid #ccc",
                        padding: "10px",
                    }}
                >
                    <h2>{item.bulan}</h2>
                    <div style={{ marginLeft: "20px" }}>
                        {item.programs && item.programs.length > 0 ? (
                            item.programs.map((program) => (
                                <div
                                    key={program.id}
                                    style={{ marginTop: "10px" }}
                                >
                                    <h3>Program: {program.nama_program}</h3>
                                    <p>Indikator: {program.nama_indikator}</p>
                                    <p>
                                        Jumlah Indikator:{" "}
                                        {program.jumlah_indikator}
                                    </p>
                                    <div style={{ marginLeft: "20px" }}>
                                        {program.kegiatans &&
                                        program.kegiatans.length > 0 ? (
                                            program.kegiatans.map(
                                                (kegiatan) => (
                                                    <div
                                                        key={kegiatan.id}
                                                        style={{
                                                            marginTop: "10px",
                                                        }}
                                                    >
                                                        <h4>
                                                            Kegiatan:{" "}
                                                            {
                                                                kegiatan.nama_kegiatan
                                                            }
                                                        </h4>
                                                        <p>
                                                            Indikator:{" "}
                                                            {
                                                                kegiatan.nama_indikator
                                                            }
                                                        </p>
                                                        <p>
                                                            Jumlah Indikator:{" "}
                                                            {
                                                                kegiatan.jumlah_indikator
                                                            }
                                                        </p>
                                                        <p>
                                                            Tipe Indikator:{" "}
                                                            {
                                                                kegiatan.tipe_indikator
                                                            }
                                                        </p>
                                                        <p>
                                                            Anggaran Murni:{" "}
                                                            {
                                                                kegiatan.anggaran_murni
                                                            }
                                                        </p>
                                                        <p>
                                                            Pergeseran:{" "}
                                                            {
                                                                kegiatan.pergeseran
                                                            }
                                                        </p>
                                                        <p>
                                                            Perubahan:{" "}
                                                            {kegiatan.perubahan}
                                                        </p>
                                                        <p>
                                                            Penyerapan Anggaran:{" "}
                                                            {
                                                                kegiatan.penyerapan_anggaran
                                                            }
                                                        </p>
                                                        <div
                                                            style={{
                                                                marginLeft:
                                                                    "20px",
                                                            }}
                                                        >
                                                            {kegiatan.sub_kegiatans &&
                                                            kegiatan
                                                                .sub_kegiatans
                                                                .length > 0 ? (
                                                                kegiatan.sub_kegiatans.map(
                                                                    (
                                                                        subKegiatan
                                                                    ) => (
                                                                        <div
                                                                            key={
                                                                                subKegiatan.id
                                                                            }
                                                                            style={{
                                                                                marginTop:
                                                                                    "10px",
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
                                                                                Jumlah
                                                                                Indikator:{" "}
                                                                                {
                                                                                    subKegiatan.jumlah_indikator
                                                                                }
                                                                            </p>
                                                                            <p>
                                                                                Jumlah
                                                                                Indikator:{" "}
                                                                                {
                                                                                    subKegiatan.jumlah_indikator
                                                                                }
                                                                            </p>
                                                                            <p>
                                                                                Tipe
                                                                                Indikator:{" "}
                                                                                {
                                                                                    subKegiatan.tipe_indikator
                                                                                }
                                                                            </p>
                                                                            <p>
                                                                                Anggaran
                                                                                Murni:{" "}
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
                                                                                Penyerapan
                                                                                Anggaran:{" "}
                                                                                {
                                                                                    subKegiatan.penyerapan_anggaran
                                                                                }
                                                                            </p>
                                                                        </div>
                                                                    )
                                                                )
                                                            ) : (
                                                                <p>
                                                                    No
                                                                    Sub-Kegiatan
                                                                    available
                                                                </p>
                                                            )}
                                                        </div>
                                                    </div>
                                                )
                                            )
                                        ) : (
                                            <p>No Kegiatan available</p>
                                        )}
                                    </div>
                                </div>
                            ))
                        ) : (
                            <p>No Programs available</p>
                        )}
                    </div>
                </div>
            ))}
        </div>
    );
};

export default BulanDetail;
