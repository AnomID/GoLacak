import React from "react";
import { useForm, Link } from "@inertiajs/react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import FormInput from "@/Components/FormInput"; // Impor komponen FormInput

const CreateSubKegiatan = ({ kegiatan, auth }) => {
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
        post(route("subkegiatan.store", { kegiatan: kegiatan.id }), {
            data: formData,
        });
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-6 bg-[#FCFAEE] rounded-lg shadow-md">
                <h1 className="text-2xl font-bold mb-6 text-[#384B70]">
                    Buat Sub Kegiatan dalam {kegiatan.nama_kegiatan}
                </h1>
                <form
                    onSubmit={submit}
                    className="bg-white p-6 rounded-lg shadow-lg"
                >
                    <div className="grid grid-cols-1 gap-4">
                        <FormInput
                            label="Nama Sub Kegiatan"
                            value={data.nama_sub_kegiatan}
                            onChange={(e) =>
                                setData("nama_sub_kegiatan", e.target.value)
                            }
                            error={errors.nama_sub_kegiatan}
                        />
                        <FormInput
                            label="Nama Indikator"
                            value={data.nama_indikator}
                            onChange={(e) =>
                                setData("nama_indikator", e.target.value)
                            }
                            error={errors.nama_indikator}
                        />
                        <FormInput
                            label="Jumlah Indikator"
                            type="number"
                            value={data.jumlah_indikator}
                            onChange={(e) =>
                                setData("jumlah_indikator", e.target.value)
                            }
                            error={errors.jumlah_indikator}
                        />
                        <FormInput
                            label="Tipe Indikator"
                            value={data.tipe_indikator}
                            onChange={(e) =>
                                setData("tipe_indikator", e.target.value)
                            }
                            error={errors.tipe_indikator}
                        />
                        <FormInput
                            label="Anggaran Murni"
                            type="number"
                            step="0.01"
                            value={data.anggaran_murni}
                            onChange={(e) =>
                                setData("anggaran_murni", e.target.value)
                            }
                            error={errors.anggaran_murni}
                        />
                        <FormInput
                            label="Pergeseran"
                            type="number"
                            step="0.01"
                            value={data.pergeseran}
                            onChange={(e) =>
                                setData("pergeseran", e.target.value)
                            }
                            error={errors.pergeseran}
                        />
                        <FormInput
                            label="Perubahan"
                            type="number"
                            step="0.01"
                            value={data.perubahan}
                            onChange={(e) =>
                                setData("perubahan", e.target.value)
                            }
                            error={errors.perubahan}
                        />
                        <FormInput
                            label="Penyerapan Anggaran"
                            type="number"
                            step="0.01"
                            value={data.penyerapan_anggaran}
                            onChange={(e) =>
                                setData("penyerapan_anggaran", e.target.value)
                            }
                            error={errors.penyerapan_anggaran}
                        />
                        <FormInput
                            label="Persen Penyerapan Anggaran"
                            type="number"
                            step="0.01"
                            value={data.persen_penyerapan_anggaran}
                            onChange={(e) =>
                                setData(
                                    "persen_penyerapan_anggaran",
                                    e.target.value
                                )
                            }
                            error={errors.persen_penyerapan_anggaran}
                        />
                    </div>

                    {/* Input hidden untuk kegiatan_id */}
                    <input
                        type="hidden"
                        name="kegiatan_id"
                        value={data.kegiatan_id}
                    />

                    {/* Tombol Submit */}
                    <button
                        type="submit"
                        className="bg-[#384B70] text-white py-2 px-4 rounded hover:bg-[#507687] transition duration-300 mt-4"
                    >
                        Simpan
                    </button>

                    {/* Tombol Cancel */}
                    <Link
                        href={route("subkegiatan.index", kegiatan.id)}
                        className="inline-block mt-2 border border-[#B8001F] text-[#B8001F] bg-transparent py-2 px-4 rounded hover:bg-[#B8001F] hover:text-white transition duration-300 ml-2"
                    >
                        Batal
                    </Link>
                </form>
            </div>
        </AuthenticatedLayout>
    );
};

export default CreateSubKegiatan;
