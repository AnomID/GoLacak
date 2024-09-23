import React from "react";
import { useForm, Link } from "@inertiajs/react";

const CreateSubKegiatan = ({ kegiatan }) => {
    const { data, setData, post, errors } = useForm({
        nama_sub_kegiatan: "",
        nama_indikator: "",
        jumlah_indikator: "",
        tipe_indikator: "",
        anggaran_murni: "",
        pergeseran: "",
        perubahan: "",
        penyerapan_anggaran: "",
        persen_penyerapan_anggaran: "",
        kegiatan_id: kegiatan.id, // Mengisi kegiatan_id secara otomatis
    });

    const submit = (e) => {
        e.preventDefault();
        const formData = {
            ...data,
            anggaran_murni: data.anggaran_murni || 0,
            pergeseran: data.pergeseran || 0,
            perubahan: data.perubahan || 0,
            penyerapan_anggaran: data.penyerapan_anggaran || 0,
            persen_penyerapan_anggaran: data.persen_penyerapan_anggaran || 0,
        };
        post(route("subkegiatan.store"), { data: formData });
    };

    return (
        <div>
            <h1>Create Sub Kegiatan for {kegiatan.nama_kegiatan}</h1>
            <form onSubmit={submit}>
                <div>
                    <label>Nama Sub Kegiatan</label>
                    <input
                        type="text"
                        value={data.nama_sub_kegiatan}
                        onChange={(e) =>
                            setData("nama_sub_kegiatan", e.target.value)
                        }
                    />
                    {errors.nama_sub_kegiatan && (
                        <div>{errors.nama_sub_kegiatan}</div>
                    )}
                </div>

                <div>
                    <label>Nama Indikator</label>
                    <input
                        type="text"
                        value={data.nama_indikator}
                        onChange={(e) =>
                            setData("nama_indikator", e.target.value)
                        }
                    />
                    {errors.nama_indikator && (
                        <div>{errors.nama_indikator}</div>
                    )}
                </div>

                <div>
                    <label>Jumlah Indikator</label>
                    <input
                        type="number"
                        value={data.jumlah_indikator}
                        onChange={(e) =>
                            setData("jumlah_indikator", e.target.value)
                        }
                    />
                    {errors.jumlah_indikator && (
                        <div>{errors.jumlah_indikator}</div>
                    )}
                </div>

                <div>
                    <label>Tipe Indikator</label>
                    <input
                        type="text"
                        value={data.tipe_indikator}
                        onChange={(e) =>
                            setData("tipe_indikator", e.target.value)
                        }
                    />
                    {errors.tipe_indikator && (
                        <div>{errors.tipe_indikator}</div>
                    )}
                </div>

                <div>
                    <label>Anggaran Murni</label>
                    <input
                        type="number"
                        step="0.01"
                        value={data.anggaran_murni}
                        onChange={(e) =>
                            setData("anggaran_murni", e.target.value)
                        }
                    />
                    {errors.anggaran_murni && (
                        <div>{errors.anggaran_murni}</div>
                    )}
                </div>

                <div>
                    <label>Pergeseran</label>
                    <input
                        type="number"
                        step="0.01"
                        value={data.pergeseran}
                        onChange={(e) => setData("pergeseran", e.target.value)}
                    />
                    {errors.pergeseran && <div>{errors.pergeseran}</div>}
                </div>

                <div>
                    <label>Perubahan</label>
                    <input
                        type="number"
                        step="0.01"
                        value={data.perubahan}
                        onChange={(e) => setData("perubahan", e.target.value)}
                    />
                    {errors.perubahan && <div>{errors.perubahan}</div>}
                </div>

                <div>
                    <label>Penyerapan Anggaran</label>
                    <input
                        type="number"
                        step="0.01"
                        value={data.penyerapan_anggaran}
                        onChange={(e) =>
                            setData("penyerapan_anggaran", e.target.value)
                        }
                    />
                    {errors.penyerapan_anggaran && (
                        <div>{errors.penyerapan_anggaran}</div>
                    )}
                </div>

                <div>
                    <label>Persen Penyerapan Anggaran</label>
                    <input
                        type="number"
                        step="0.01"
                        value={data.persen_penyerapan_anggaran}
                        onChange={(e) =>
                            setData(
                                "persen_penyerapan_anggaran",
                                e.target.value
                            )
                        }
                    />
                    {errors.persen_penyerapan_anggaran && (
                        <div>{errors.persen_penyerapan_anggaran}</div>
                    )}
                </div>

                {/* Input hidden untuk kegiatan_id */}
                <input
                    type="hidden"
                    name="kegiatan_id"
                    value={data.kegiatan_id}
                />

                <button type="submit">Submit</button>
                <Link href={route("kegiatan.index", kegiatan.id)}>Cancel</Link>
            </form>
        </div>
    );
};

export default CreateSubKegiatan;
