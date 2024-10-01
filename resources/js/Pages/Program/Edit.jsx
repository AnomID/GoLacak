import React from "react";
import { useForm, Link } from "@inertiajs/react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import FormInput from "@/Components/FormInput"; // Impor komponen FormInput

const EditProgram = ({ program, auth }) => {
    const { data, setData, put, errors } = useForm(program);

    const submit = (e) => {
        e.preventDefault();
        put(route("program.update", program.id));
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-6 bg-[#FCFAEE] rounded-lg shadow-md">
                <h1 className="text-2xl font-bold mb-6 text-[#384B70]">
                    Edit Program
                </h1>
                <form
                    onSubmit={submit}
                    className="bg-white p-6 rounded-lg shadow-lg"
                >
                    <div className="grid grid-cols-1 gap-4">
                        <FormInput
                            label="Nama Program"
                            value={data.nama_program}
                            onChange={(e) =>
                                setData("nama_program", e.target.value)
                            }
                            error={errors.nama_program}
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
                            value={data.anggaran_murni}
                            onChange={(e) =>
                                setData("anggaran_murni", e.target.value)
                            }
                            error={errors.anggaran_murni}
                        />
                        <FormInput
                            label="Pergeseran"
                            type="number"
                            value={data.pergeseran}
                            onChange={(e) =>
                                setData("pergeseran", e.target.value)
                            }
                            error={errors.pergeseran}
                        />
                        <FormInput
                            label="Perubahan"
                            type="number"
                            value={data.perubahan}
                            onChange={(e) =>
                                setData("perubahan", e.target.value)
                            }
                            error={errors.perubahan}
                        />
                        <FormInput
                            label="Penyerapan Anggaran"
                            type="number"
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

                    {/* Tombol Update */}
                    <button
                        type="submit"
                        className="bg-[#384B70] text-white py-2 px-4 rounded hover:bg-[#507687] transition duration-300 mt-4"
                    >
                        Update
                    </button>

                    {/* Tombol Cancel */}
                    <Link
                        href={route("program.index", program.bulan_id)}
                        className="inline-block mt-2 border border-[#B8001F] text-[#B8001F] bg-transparent py-2 px-4 rounded hover:bg-[#B8001F] hover:text-white transition duration-300 ml-2"
                    >
                        Cancel
                    </Link>
                </form>
            </div>
        </AuthenticatedLayout>
    );
};

export default EditProgram;
