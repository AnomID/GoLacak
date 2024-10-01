import React, { useState } from "react";

const SubKegiatan = ({ subKegiatan }) => {
    const [open, setOpen] = useState(false);

    return (
        <div className="mt-3">
            <h5
                onClick={() => setOpen(!open)}
                className="cursor-pointer bg-gray-400 p-2 rounded-md text-base font-medium"
            >
                {open ? "▼" : "▶"} Sub-Kegiatan: {subKegiatan.nama_sub_kegiatan}
            </h5>

            {open && (
                <div className="pl-6">
                    <p>
                        <strong>Indikator:</strong> {subKegiatan.nama_indikator}
                    </p>
                    <p>
                        <strong>Jumlah Indikator:</strong>{" "}
                        {subKegiatan.jumlah_indikator}
                    </p>
                    <p>
                        <strong>Tipe Indikator:</strong>{" "}
                        {subKegiatan.tipe_indikator}
                    </p>
                    <p>
                        <strong>Anggaran Murni:</strong>{" "}
                        {subKegiatan.anggaran_murni}
                    </p>
                    <p>
                        <strong>Pergeseran:</strong> {subKegiatan.pergeseran}
                    </p>
                    <p>
                        <strong>Perubahan:</strong> {subKegiatan.perubahan}
                    </p>
                    <p>
                        <strong>Penyerapan Anggaran:</strong>{" "}
                        {subKegiatan.penyerapan_anggaran}
                    </p>
                    <p>
                        <strong>Persen Penyerapan:</strong>{" "}
                        {subKegiatan.persen_penyerapan_anggaran}%
                    </p>
                </div>
            )}
        </div>
    );
};

export default SubKegiatan;
