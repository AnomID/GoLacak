import React from "react";
import { Link } from "@inertiajs/react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import DataTable from "@/Components/DataTable"; // Import the new DataTable component
import { ArrowsPointingInIcon, PencilIcon } from "@heroicons/react/24/solid"; // Import icons

const KegiatanIndex = ({ kegiatan, program, bulan, auth }) => {
    // Define columns for the Kegiatan index
    const columns = [
        "Nama Kegiatan",
        "Nama Indikator",
        "Jumlah Indikator",
        "Tipe Indikator",
        "Anggaran Murni",
        "Pergeseran",
        "Perubahan",
        "Penyerapan Anggaran",
        "Persen Penyerapan Anggaran",
    ];

    // Prepare the data to include all relevant fields
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

    // Define actions for each kegiatan
    const actions = (keg) => (
        <>
            <Link
                href={route("user.subkegiatan.index", keg.id)}
                className="bg-[#507687] text-white py-2 px-4 rounded flex items-center text-xs hover:bg-[#384B70] transition duration-300"
            >
                <ArrowsPointingInIcon
                    className="h-6 w-6 mr-1"
                    aria-hidden="true"
                />{" "}
                {/* Increased size here */}
                Lihat Sub Kegiatan
            </Link>

            <Link
                href={route("user.kegiatan.edit-anggaran", keg.id)}
                className="bg-red-600 text-white py-2 px-4 rounded flex items-center text-xs hover:bg-red-700 transition duration-300"
            >
                <PencilIcon className="h-6 w-6 mr-1" aria-hidden="true" />{" "}
                {/* Increased size here */}
                Update Anggaran
            </Link>
        </>
    );

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <div className="mb-6 text-[#384B70] text-left sm:text-left">
                    <h1 className="text-2xl font-bold mb-1">
                        Bulan {bulan.bulan}
                    </h1>
                    <h2 className="text-xl font-semibold">
                        {program.nama_program}
                    </h2>
                </div>
                <h1 className="text-2xl font-bold mb-6 text-[#384B70] text-left">
                    Daftar Kegiatan
                </h1>

                <div className="mb-4 flex flex-col sm:flex-row sm:space-x-2">
                    <Link
                        href={route("user.program.index", program.bulan_id)}
                        className="bg-[#B8001F] text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300 mb-2 sm:mb-0"
                    >
                        Kembali ke Program
                    </Link>
                </div>

                <div className="bg-white p-4 rounded-lg shadow overflow-x-auto">
                    {kegiatan.length > 0 ? (
                        <DataTable
                            columns={columns}
                            data={data}
                            actions={actions}
                            excludeFields={["id"]} // Exclude id from being displayed in the table
                        />
                    ) : (
                        <div className="text-center py-4">
                            No kegiatan available for this program.
                        </div>
                    )}
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default KegiatanIndex;
