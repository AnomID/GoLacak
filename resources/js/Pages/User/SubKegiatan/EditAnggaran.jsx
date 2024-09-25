import React from "react";
import { useForm } from "@inertiajs/react";
import { Link } from "@inertiajs/inertia-react";

const EditAnggaranSubKegiatan = ({ subkegiatan }) => {
    const { data, setData, patch, errors } = useForm({
        anggaran_murni: subkegiatan.anggaran_murni || 0,
        pergeseran: subkegiatan.pergeseran || 0,
        perubahan: subkegiatan.perubahan || 0,
        penyerapan_anggaran: subkegiatan.penyerapan_anggaran || 0,
        persen_penyerapan_anggaran: subkegiatan.persen_penyerapan_anggaran || 0,
    });

    const submit = (e) => {
        e.preventDefault();
        patch(route("user.subkegiatan.update-anggaran", subkegiatan.id));
    };

    return (
        <div>
            <h1>
                Update Anggaran for Sub Kegiatan:{" "}
                {subkegiatan.nama_sub_kegiatan}
            </h1>
            <form onSubmit={submit}>
                <div>
                    <label>Anggaran Murni</label>
                    <input
                        type="number"
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
                        value={data.pergeseran}
                        onChange={(e) => setData("pergeseran", e.target.value)}
                    />
                    {errors.pergeseran && <div>{errors.pergeseran}</div>}
                </div>

                <div>
                    <label>Perubahan</label>
                    <input
                        type="number"
                        value={data.perubahan}
                        onChange={(e) => setData("perubahan", e.target.value)}
                    />
                    {errors.perubahan && <div>{errors.perubahan}</div>}
                </div>

                <div>
                    <label>Penyerapan Anggaran</label>
                    <input
                        type="number"
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

                <button type="submit">Update</button>
                <Link
                    href={route(
                        "user.subkegiatan.index",
                        { kegiatan: subkegiatan.kegiatan_id } // Pastikan parameter 'kegiatan' disertakan
                    )}
                >
                    Cancel
                </Link>
            </form>
        </div>
    );
};

export default EditAnggaranSubKegiatan;
