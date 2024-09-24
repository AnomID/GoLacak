import React from "react";
import { useForm, Link } from "@inertiajs/react";

const EditSubKegiatan = ({ subkegiatan }) => {
    const { data, setData, put, errors } = useForm(subkegiatan);

    const submit = (e) => {
        e.preventDefault();
        const formData = {
            ...data,
            anggaran_subkegiatan: data.anggaran_subkegiatan || 0,
        };
        put(
            route("subkegiatan.update", {
                kegiatan: subkegiatan.kegiatan_id,
                subkegiatan: subkegiatan.id,
            }),
            {
                data: formData,
            }
        );
    };

    return (
        <div>
            <h1>Edit Sub Kegiatan</h1>
            <form onSubmit={submit}>
                <div>
                    <label>Nama Sub Kegiatan</label>
                    <input
                        type="text"
                        value={data.nama_subkegiatan}
                        onChange={(e) =>
                            setData("nama_subkegiatan", e.target.value)
                        }
                    />
                    {errors.nama_subkegiatan && (
                        <div>{errors.nama_subkegiatan}</div>
                    )}
                </div>

                <div>
                    <label>Jumlah Sub Indikator</label>
                    <input
                        type="number"
                        value={data.jumlah_subindikator}
                        onChange={(e) =>
                            setData("jumlah_subindikator", e.target.value)
                        }
                    />
                    {errors.jumlah_subindikator && (
                        <div>{errors.jumlah_subindikator}</div>
                    )}
                </div>

                <div>
                    <label>Tipe Sub Indikator</label>
                    <input
                        type="text"
                        value={data.tipe_subindikator}
                        onChange={(e) =>
                            setData("tipe_subindikator", e.target.value)
                        }
                    />
                    {errors.tipe_subindikator && (
                        <div>{errors.tipe_subindikator}</div>
                    )}
                </div>

                <div>
                    <label>Anggaran Sub Kegiatan</label>
                    <input
                        type="number"
                        step="0.01"
                        value={data.anggaran_subkegiatan}
                        onChange={(e) =>
                            setData("anggaran_subkegiatan", e.target.value)
                        }
                    />
                    {errors.anggaran_subkegiatan && (
                        <div>{errors.anggaran_subkegiatan}</div>
                    )}
                </div>

                {/* Input hidden untuk kegiatan_id */}
                <input
                    type="hidden"
                    name="kegiatan_id"
                    value={data.kegiatan_id}
                />

                <button type="submit">Update</button>
                <Link href={route("subkegiatan.index", data.kegiatan_id)}>
                    Cancel
                </Link>
            </form>
        </div>
    );
};

export default EditSubKegiatan;
