import React, { useState } from "react";
import Kegiatan from "./Kegiatan";

const Program = ({ program }) => {
    const [open, setOpen] = useState(false);

    return (
        <div>
            <h3
                onClick={() => setOpen(!open)}
                className="cursor-pointer bg-gray-200 p-3 rounded-md text-lg font-semibold"
            >
                {open ? "▼" : "▶"} Program: {program.nama_program}
            </h3>

            {open && (
                <div className="pl-6 mb-4">
                    <p>
                        <strong>Indikator:</strong> {program.nama_indikator}
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
                        <strong>Pergeseran:</strong> {program.pergeseran}
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

                    {/* Display Kegiatans */}
                    {program.kegiatans.map((kegiatan) => (
                        <Kegiatan key={kegiatan.id} kegiatan={kegiatan} />
                    ))}
                </div>
            )}
        </div>
    );
};

export default Program;
