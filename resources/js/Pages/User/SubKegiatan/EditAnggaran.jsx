import React from "react";
import { useForm, Link } from "@inertiajs/inertia-react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

const EditAnggaranSubKegiatan = ({ subKegiatan, auth }) => {
    const { data, setData, patch, errors } = useForm({
        anggaran_murni: subKegiatan.anggaran_murni || 0,
        pergeseran: subKegiatan.pergeseran || 0,
        perubahan: subKegiatan.perubahan || 0,
        penyerapan_anggaran: subKegiatan.penyerapan_anggaran || 0,
        persen_penyerapan_anggaran: subKegiatan.persen_penyerapan_anggaran || 0,
    });

    const submit = (e) => {
        e.preventDefault();
        patch(route("user.subkegiatan.update-anggaran", subKegiatan.id));
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <header className="mb-6">
                    <h1 className="text-2xl font-bold text-[#384B70]">
                        Update Anggaran for Sub Kegiatan:{" "}
                        {subKegiatan.nama_sub_kegiatan}
                    </h1>
                    <h2 className="text-xl font-semibold text-[#384B70]">
                        Nama Indikator: {subKegiatan.nama_indikator}
                    </h2>
                    <h2 className="text-xl font-semibold text-[#384B70]">
                        Jumlah Indikator: {subKegiatan.jumlah_indikator}
                    </h2>
                    <h2 className="text-xl font-semibold text-[#384B70]">
                        Tipe Indikator: {subKegiatan.tipe_indikator}
                    </h2>
                </header>

                <div className="bg-white p-6 rounded-lg shadow-lg">
                    <form onSubmit={submit} className="space-y-4">
                        <div>
                            <label className="block text-sm font-medium text-gray-700">
                                Anggaran Murni
                            </label>
                            <input
                                type="number"
                                value={data.anggaran_murni}
                                onChange={(e) =>
                                    setData("anggaran_murni", e.target.value)
                                }
                                className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            />
                            {errors.anggaran_murni && (
                                <div className="text-red-600 text-sm">
                                    {errors.anggaran_murni}
                                </div>
                            )}
                        </div>

                        <div>
                            <label className="block text-sm font-medium text-gray-700">
                                Pergeseran
                            </label>
                            <input
                                type="number"
                                value={data.pergeseran}
                                onChange={(e) =>
                                    setData("pergeseran", e.target.value)
                                }
                                className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            />
                            {errors.pergeseran && (
                                <div className="text-red-600 text-sm">
                                    {errors.pergeseran}
                                </div>
                            )}
                        </div>

                        <div>
                            <label className="block text-sm font-medium text-gray-700">
                                Perubahan
                            </label>
                            <input
                                type="number"
                                value={data.perubahan}
                                onChange={(e) =>
                                    setData("perubahan", e.target.value)
                                }
                                className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            />
                            {errors.perubahan && (
                                <div className="text-red-600 text-sm">
                                    {errors.perubahan}
                                </div>
                            )}
                        </div>

                        <div>
                            <label className="block text-sm font-medium text-gray-700">
                                Penyerapan Anggaran
                            </label>
                            <input
                                type="number"
                                value={data.penyerapan_anggaran}
                                onChange={(e) =>
                                    setData(
                                        "penyerapan_anggaran",
                                        e.target.value
                                    )
                                }
                                className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            />
                            {errors.penyerapan_anggaran && (
                                <div className="text-red-600 text-sm">
                                    {errors.penyerapan_anggaran}
                                </div>
                            )}
                        </div>

                        <div>
                            <label className="block text-sm font-medium text-gray-700">
                                Persen Penyerapan Anggaran
                            </label>
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
                                className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            />
                            {errors.persen_penyerapan_anggaran && (
                                <div className="text-red-600 text-sm">
                                    {errors.persen_penyerapan_anggaran}
                                </div>
                            )}
                        </div>

                        <div className="flex justify-between items-center">
                            <button
                                type="submit"
                                className="bg-[#507687] text-white py-2 px-4 rounded hover:bg-[#384B70] transition duration-300"
                            >
                                Update
                            </button>
                            <Link
                                href={route(
                                    "user.subkegiatan.index",
                                    subKegiatan.kegiatan_id
                                )}
                                className="text-[#B8001F] hover:text-red-600 transition duration-300"
                            >
                                Cancel
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default EditAnggaranSubKegiatan;
