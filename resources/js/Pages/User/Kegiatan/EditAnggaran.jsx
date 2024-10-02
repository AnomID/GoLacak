import React from "react";
import { useForm } from "@inertiajs/react";
import { Link } from "@inertiajs/inertia-react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout"; // Import AuthenticatedLayout
import FormInput from "@/Components/FormInput"; // Import FormInput component

const EditAnggaranKegiatan = ({ kegiatan, auth }) => {
    const { data, setData, patch, errors } = useForm({
        anggaran_murni: kegiatan.anggaran_murni || 0,
        pergeseran: kegiatan.pergeseran || 0,
        perubahan: kegiatan.perubahan || 0,
        penyerapan_anggaran: kegiatan.penyerapan_anggaran || 0,
        persen_penyerapan_anggaran: kegiatan.persen_penyerapan_anggaran || 0,
    });

    const submit = (e) => {
        e.preventDefault();
        patch(route("user.kegiatan.update-anggaran", kegiatan.id));
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-6 bg-[#FCFAEE] rounded-lg shadow-md">
                <h1 className="text-2xl font-bold mb-6 text-[#384B70] font-poppins">
                    Ubah Anggaran
                </h1>
                <h2 className="text-2xl font-bold mb-6 text-[#384B70] font-poppins">
                    {kegiatan.nama_kegiatan}
                </h2>
                <h2 className="text-lg font-medium mb-4 font-roboto">
                    Nama Indikator: {kegiatan.nama_indikator}
                </h2>
                <h2 className="text-lg font-medium mb-4 font-roboto">
                    Jumlah Indikator: {kegiatan.jumlah_indikator}
                </h2>
                <h2 className="text-lg font-medium mb-4 font-roboto">
                    Tipe Indikator: {kegiatan.tipe_indikator}
                </h2>

                <form
                    onSubmit={submit}
                    className="bg-white p-6 rounded-lg shadow-lg"
                >
                    <div className="grid grid-cols-1 gap-4">
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

                    {/* Update Button */}
                    <button
                        type="submit"
                        className="bg-[#384B70] text-white py-2 px-4 rounded hover:bg-[#507687] transition duration-300 mt-4"
                    >
                        Ubah
                    </button>

                    {/* Cancel Button */}
                    <Link
                        href={route("user.kegiatan.index", kegiatan.program_id)}
                        className="inline-block mt-2 border border-[#B8001F] text-[#B8001F] bg-transparent py-2 px-4 rounded hover:bg-[#B8001F] hover:text-white transition duration-300 ml-2"
                    >
                        Batal
                    </Link>
                </form>
            </div>
        </AuthenticatedLayout>
    );
};

export default EditAnggaranKegiatan;
