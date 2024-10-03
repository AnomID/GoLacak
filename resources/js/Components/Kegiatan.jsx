import React, { useState } from "react";
import SubKegiatan from "./SubKegiatan";

const Kegiatan = ({ kegiatan }) => {
    const [open, setOpen] = useState(false);

    return (
        <div className="mt-4">
            <h4
                onClick={() => setOpen(!open)}
                className="cursor-pointer bg-gray-300 p-2 rounded-md text-base font-medium"
            >
                {open ? "▼" : "▶"} Kegiatan: {kegiatan.nama_kegiatan}
            </h4>

            {open && (
                <div className="pl-6 mb-3">
                    <p>
                        <strong>Indikator:</strong> {kegiatan.nama_indikator}
                    </p>
                    <p>
                        <strong>Jumlah Indikator:</strong>{" "}
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
                        <strong>Pergeseran:</strong> {kegiatan.pergeseran}
                    </p>
                    <p>
                        <strong>Perubahan:</strong> {kegiatan.perubahan}
                    </p>
                    <p>
                        <strong>Penyerapan Anggaran:</strong>{" "}
                        {kegiatan.penyerapan_anggaran}
                    </p>
                    <p>
                        <strong>Persen Penyerapan:</strong>{" "}
                        {kegiatan.persen_penyerapan_anggaran}%
                    </p>

                    {/* Display Sub-Kegiatans */}
                    {kegiatan.sub_kegiatans.map((subKegiatan) => (
                        <SubKegiatan
                            key={subKegiatan.id}
                            subKegiatan={subKegiatan}
                        />
                    ))}
                </div>
            )}
        </div>
    );
};

export default Kegiatan;
