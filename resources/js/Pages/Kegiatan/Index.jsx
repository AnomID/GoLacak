import React, { useState } from "react";
import { Link, Inertia } from "@inertiajs/inertia-react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import DataTable from "@/Components/DataTable";
import { EyeIcon, PencilIcon, TrashIcon } from "@heroicons/react/24/solid";

const KegiatanIndex = ({ kegiatan, program, bulan, auth }) => {
    const [deleteId, setDeleteId] = useState(null);
    const [showModal, setShowModal] = useState(false);

    const handleDelete = (id) => {
        setDeleteId(id);
        setShowModal(true);
    };

    const confirmDelete = () => {
        Inertia.delete(route("kegiatan.destroy", deleteId));
        setShowModal(false);
    };

    const columns = [
        "Nama Kegiatan",
        "Nama Indikator",
        "Jumlah Indikator",
        "Tipe Indikator",
        "Anggaran Murni",
        "Pergeseran",
        "Perubahan",
        "Penyerapan Anggaran",
        "Persen Penyerapan",
    ];

    const data = kegiatan.map((keg) => ({
        nama_kegiatan: keg.nama_kegiatan,
        nama_indikator: keg.nama_indikator,
        jumlah_indikator: keg.jumlah_indikator,
        tipe_indikator: keg.tipe_indikator,
        anggaran_murni: keg.anggaran_murni,
        pergeseran: keg.pergeseran,
        perubahan: keg.perubahan,
        penyerapan_anggaran: keg.penyerapan_anggaran,
        persen_penyerapan_anggaran: `${keg.persen_penyerapan_anggaran}%`,
        id: keg.id,
    }));

    const actions = (keg) => (
        <>
            <Link
                href={route("subkegiatan.index", keg.id)}
                className="bg-[#507687] text-white py-1 px-3 rounded hover:bg-[#384B70] transition duration-300 inline-flex items-center text-xs"
            >
                <EyeIcon className="h-6 w-6 mr-1" aria-hidden="true" /> View Sub
                Kegiatan
            </Link>
            <Link
                href={route("kegiatan.edit", keg.id)}
                className="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 transition duration-300 inline-flex items-center text-xs"
            >
                <PencilIcon className="h-4 w-4 mr-1" aria-hidden="true" />
                Edit
            </Link>
            <button
                onClick={() => handleDelete(keg.id)}
                className="bg-red-600 text-white py-1 px-3 rounded hover:bg-red-700 transition duration-300 inline-flex items-center text-xs"
            >
                <TrashIcon className="h-4 w-4 mr-1" aria-hidden="true" />
                Delete
            </button>
        </>
    );

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <div className="mb-6 text-[#384B70] text-left sm:text-left">
                    <h1 className="text-2xl font-bold mb-1">
                        Bulan: {bulan.bulan}
                    </h1>
                    <h2 className="text-xl font-semibold">
                        {program.nama_program}
                    </h2>
                </div>
                <h1 className="text-2xl font-bold mb-6 text-[#384B70] text-left">
                    Daftar Kegiatan
                </h1>

                {/* Tombol kembali ke daftar program */}
                <div className="mb-4 flex flex-col sm:flex-row sm:space-x-2">
                    <Link
                        href={route("program.index", {
                            bulan: program.bulan_id,
                        })}
                        className="bg-[#B8001F] text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300 mb-2 sm:mb-0"
                    >
                        Kembali ke Daftar Program
                    </Link>

                    {/* Tambahkan tombol Add Kegiatan */}
                    <Link
                        href={route("kegiatan.create", program.id)}
                        className="bg-[#384B70] text-white py-2 px-4 rounded hover:bg-[#507687] transition duration-300"
                    >
                        Tambah Kegiatan
                    </Link>
                </div>

                {/* Tabel data */}
                <div className="bg-white p-4 rounded-lg shadow overflow-x-auto">
                    <DataTable
                        columns={columns}
                        data={data}
                        actions={actions}
                        excludeFields={["id"]}
                    />
                </div>

                {/* Modal delete confirmation */}
                {showModal && (
                    <div className="fixed inset-0 flex items-center justify-center z-50">
                        <div className="bg-white rounded-lg shadow-lg p-6 w-96">
                            <h2 className="text-lg font-semibold mb-4">
                                Confirm Delete
                            </h2>
                            <p>
                                Apakah kamu yakin ingin menghapus kegiatan ini ?
                            </p>
                            <div className="mt-4 flex justify-end">
                                <button
                                    onClick={() => setShowModal(false)}
                                    className="bg-gray-300 text-black py-1 px-3 rounded hover:bg-gray-400 mr-2"
                                >
                                    Cancel
                                </button>
                                <button
                                    onClick={confirmDelete}
                                    className="bg-red-600 text-white py-1 px-3 rounded hover:bg-red-500"
                                >
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                )}
            </div>
        </AuthenticatedLayout>
    );
};

export default KegiatanIndex;
