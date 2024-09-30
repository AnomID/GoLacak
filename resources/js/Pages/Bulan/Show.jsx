import React, { useState } from "react";
import { Link } from "@inertiajs/inertia-react";

const BulanShow = ({ bulan }) => {
    // State to manage open/close status for programs, activities, and sub-activities
    const [openProgram, setOpenProgram] = useState({});
    const [openKegiatan, setOpenKegiatan] = useState({});
    const [openSubKegiatan, setOpenSubKegiatan] = useState({});

    // Toggle the visibility of programs
    const toggleProgram = (id) => {
        setOpenProgram((prevState) => ({
            ...prevState,
            [id]: !prevState[id],
        }));
    };

    // Toggle the visibility of activities
    const toggleKegiatan = (id) => {
        setOpenKegiatan((prevState) => ({
            ...prevState,
            [id]: !prevState[id],
        }));
    };

    // Toggle the visibility of sub-activities
    const toggleSubKegiatan = (id) => {
        setOpenSubKegiatan((prevState) => ({
            ...prevState,
            [id]: !prevState[id],
        }));
    };

    // Calculate totals
    const totalAnggaranMurni = bulan.programs.reduce(
        (total, program) => total + (program.anggaran_murni || 0),
        0
    );

    const totalPergeseran = bulan.programs.reduce(
        (total, program) => total + (program.pergeseran || 0),
        0
    );

    const totalPerubahan = bulan.programs.reduce(
        (total, program) => total + (program.perubahan || 0),
        0
    );

    return (
        <div>
            {/* Back Button */}
            <Link
                href={route("admin.bulan.index")}
                className="btn btn-sm btn-secondary"
            >
                Back to List
            </Link>
            <h1>Rincian Bulan: {bulan.bulan}</h1>

            {/* Display Programs */}
            {bulan.programs.map((program) => (
                <div key={program.id} style={{ marginBottom: "20px" }}>
                    {/* Program Header */}
                    <h3
                        onClick={() => toggleProgram(program.id)}
                        style={{
                            cursor: "pointer",
                            background: "#f0f0f0",
                            padding: "10px",
                            borderRadius: "5px",
                            marginBottom: "5px",
                        }}
                    >
                        {openProgram[program.id] ? "▼" : "▶"} Program:{" "}
                        {program.nama_program}
                    </h3>

                    {/* Program Details */}
                    {openProgram[program.id] && (
                        <div
                            style={{
                                paddingLeft: "20px",
                                marginBottom: "15px",
                            }}
                        >
                            <p>
                                <strong>Indikator:</strong>{" "}
                                {program.nama_indikator}
                            </p>
                            <p>
                                <strong>Jumlah Indikator:</strong>{" "}
                                {program.jumlah_indikator}
                            </p>
                            <p>
                                <strong>Tipe Indikator:</strong>{" "}
                                {program.tipe_indikator}
                            </p>
                            <p>
                                <strong>Anggaran Murni:</strong>{" "}
                                {program.anggaran_murni}
                            </p>
                            <p>
                                <strong>Pergeseran:</strong>{" "}
                                {program.pergeseran}
                            </p>
                            <p>
                                <strong>Perubahan:</strong> {program.perubahan}
                            </p>
                            <p>
                                <strong>Penyerapan Anggaran:</strong>{" "}
                                {program.penyerapan_anggaran}
                            </p>
                            <p>
                                <strong>Persen Penyerapan:</strong>{" "}
                                {program.persen_penyerapan_anggaran}%
                            </p>

                            {/* Display Activities */}
                            {program.kegiatans.map((kegiatan) => (
                                <div
                                    key={kegiatan.id}
                                    style={{ marginBottom: "10px" }}
                                >
                                    {/* Kegiatan Header */}
                                    <h4
                                        onClick={() =>
                                            toggleKegiatan(kegiatan.id)
                                        }
                                        style={{
                                            cursor: "pointer",
                                            background: "#e0e0e0",
                                            padding: "8px",
                                            borderRadius: "5px",
                                            marginBottom: "5px",
                                        }}
                                    >
                                        {openKegiatan[kegiatan.id] ? "▼" : "▶"}{" "}
                                        Kegiatan: {kegiatan.nama_kegiatan}
                                    </h4>

                                    {/* Kegiatan Details */}
                                    {openKegiatan[kegiatan.id] && (
                                        <div
                                            style={{
                                                paddingLeft: "20px",
                                                marginBottom: "10px",
                                            }}
                                        >
                                            <p>
                                                <strong>Indikator:</strong>{" "}
                                                {kegiatan.nama_indikator}
                                            </p>
                                            <p>
                                                <strong>
                                                    Jumlah Indikator:
                                                </strong>{" "}
                                                {kegiatan.jumlah_indikator}
                                            </p>
                                            <p>
                                                <strong>Tipe Indikator:</strong>{" "}
                                                {kegiatan.tipe_indikator}
                                            </p>
                                            <p>
                                                <strong>Anggaran Murni:</strong>{" "}
                                                {kegiatan.anggaran_murni}
                                            </p>
                                            <p>
                                                <strong>Pergeseran:</strong>{" "}
                                                {kegiatan.pergeseran}
                                            </p>
                                            <p>
                                                <strong>Perubahan:</strong>{" "}
                                                {kegiatan.perubahan}
                                            </p>
                                            <p>
                                                <strong>
                                                    Penyerapan Anggaran:
                                                </strong>{" "}
                                                {kegiatan.penyerapan_anggaran}
                                            </p>
                                            <p>
                                                <strong>
                                                    Persen Penyerapan:
                                                </strong>{" "}
                                                {
                                                    kegiatan.persen_penyerapan_anggaran
                                                }
                                                %
                                            </p>

                                            {/* Display Sub-Activities */}
                                            {kegiatan.sub_kegiatans.map(
                                                (subKegiatan) => (
                                                    <div
                                                        key={subKegiatan.id}
                                                        style={{
                                                            marginBottom:
                                                                "10px",
                                                        }}
                                                    >
                                                        {/* Sub-Kegiatan Header */}
                                                        <h5
                                                            onClick={() =>
                                                                toggleSubKegiatan(
                                                                    subKegiatan.id
                                                                )
                                                            }
                                                            style={{
                                                                cursor: "pointer",
                                                                background:
                                                                    "#d0d0d0",
                                                                padding: "6px",
                                                                borderRadius:
                                                                    "5px",
                                                                marginBottom:
                                                                    "5px",
                                                            }}
                                                        >
                                                            {openSubKegiatan[
                                                                subKegiatan.id
                                                            ]
                                                                ? "▼"
                                                                : "▶"}{" "}
                                                            Sub-Kegiatan:{" "}
                                                            {
                                                                subKegiatan.nama_sub_kegiatan
                                                            }
                                                        </h5>

                                                        {/* Sub-Kegiatan Details */}
                                                        {openSubKegiatan[
                                                            subKegiatan.id
                                                        ] && (
                                                            <div
                                                                style={{
                                                                    paddingLeft:
                                                                        "20px",
                                                                }}
                                                            >
                                                                <p>
                                                                    <strong>
                                                                        Indikator:
                                                                    </strong>{" "}
                                                                    {
                                                                        subKegiatan.nama_indikator
                                                                    }
                                                                </p>
                                                                <p>
                                                                    <strong>
                                                                        Jumlah
                                                                        Indikator:
                                                                    </strong>{" "}
                                                                    {
                                                                        subKegiatan.jumlah_indikator
                                                                    }
                                                                </p>
                                                                <p>
                                                                    <strong>
                                                                        Tipe
                                                                        Indikator:
                                                                    </strong>{" "}
                                                                    {
                                                                        subKegiatan.tipe_indikator
                                                                    }
                                                                </p>
                                                                <p>
                                                                    <strong>
                                                                        Anggaran
                                                                        Murni:
                                                                    </strong>{" "}
                                                                    {
                                                                        subKegiatan.anggaran_murni
                                                                    }
                                                                </p>
                                                                <p>
                                                                    <strong>
                                                                        Pergeseran:
                                                                    </strong>{" "}
                                                                    {
                                                                        subKegiatan.pergeseran
                                                                    }
                                                                </p>
                                                                <p>
                                                                    <strong>
                                                                        Perubahan:
                                                                    </strong>{" "}
                                                                    {
                                                                        subKegiatan.perubahan
                                                                    }
                                                                </p>
                                                                <p>
                                                                    <strong>
                                                                        Penyerapan
                                                                        Anggaran:
                                                                    </strong>{" "}
                                                                    {
                                                                        subKegiatan.penyerapan_anggaran
                                                                    }
                                                                </p>
                                                                <p>
                                                                    <strong>
                                                                        Persen
                                                                        Penyerapan:
                                                                    </strong>{" "}
                                                                    {
                                                                        subKegiatan.persen_penyerapan_anggaran
                                                                    }
                                                                    %
                                                                </p>
                                                            </div>
                                                        )}
                                                    </div>
                                                )
                                            )}
                                        </div>
                                    )}
                                </div>
                            ))}
                        </div>
                    )}
                </div>
            ))}

            {/* Display Totals */}
            <div
                style={{
                    marginTop: "20px",
                    padding: "10px",
                    border: "1px solid #ccc",
                    borderRadius: "5px",
                }}
            >
                <h3>Total Anggaran:</h3>
                <p>
                    <strong>Anggaran Murni Total:</strong> {totalAnggaranMurni}
                </p>
                <p>
                    <strong>Pergeseran Total:</strong> {totalPergeseran}
                </p>
                <p>
                    <strong>Perubahan Total:</strong> {totalPerubahan}
                </p>
            </div>
        </div>
    );
};

export default BulanShow;
