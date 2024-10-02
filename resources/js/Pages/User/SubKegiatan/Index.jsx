import React from "react";
import { Link } from "@inertiajs/inertia-react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import DataTable from "@/Components/DataTable"; // Import DataTable component
import { PencilIcon, TrashIcon } from "@heroicons/react/24/solid";

const SubKegiatanIndex = ({ subKegiatan, kegiatan, auth, bulan, program }) => {
    // Define columns for Sub Kegiatan table
    const columns = [
        "Nama Sub Kegiatan",
        "Nama Indikator",
        "Jumlah Indikator",
        "Tipe Indikator",
        "Anggaran Murni",
        "Pergeseran",
        "Perubahan",
        "Penyerapan Anggaran",
        "Persen Penyerapan Anggaran",
    ];
    // Prepare the data for the table
    const data = subKegiatan.map((subKeg) => ({
        nama_sub_kegiatan: subKeg.nama_sub_kegiatan,
        nama_indikator: subKeg.nama_indikator,
        jumlah_indikator: subKeg.jumlah_indikator,
        tipe_indikator: subKeg.tipe_indikator,
        anggaran_murni: subKeg.anggaran_murni,
        pergeseran: subKeg.pergeseran,
        perubahan: subKeg.perubahan,
        penyerapan_anggaran: subKeg.penyerapan_anggaran,
        persen_penyerapan_anggaran: `${subKeg.persen_penyerapan_anggaran}%`,
        id: subKeg.id,
    }));

    // Define actions for each subKegiatan
    const actions = (subKeg) => (
        <Link
            href={route("user.subkegiatan.edit-anggaran", subKeg.id)}
            className="bg-red-600 text-white py-2 px-4 rounded flex items-center text-xs hover:bg-red-700 transition duration-300"
        >
            <PencilIcon className="h-6 w-6 mr-1" aria-hidden="true" />{" "}
            {/* Increased size here */}
            Ubah Anggaran
        </Link>
    );

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <div className="mb-6 text-[#384B70] text-left sm:text-left">
                    <h1 className="text-2xl font-bold mb-1">
                        Bulan {bulan.bulan}
                    </h1>
                    <h2 className="text-xl font-semibold mb-1">
                        {program.nama_program}
                    </h2>
                    <h2 className="text-lg font-semibold mb-1">
                        Kegiatan {kegiatan.nama_kegiatan}
                    </h2>
                </div>
                <h1 className="text-2xl font-bold mb-6 text-[#384B70] text-left">
                    Daftar Sub Kegiatan{" "}
                </h1>

                <div className="mb-4 flex flex-col sm:flex-row sm:space-x-2">
                    <Link
                        href={route("user.kegiatan.index", kegiatan.program_id)}
                        className="bg-[#B8001F] text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300 mb-2 sm:mb-0"
                    >
                        Kembali ke Daftar Kegiatan
                    </Link>
                </div>

                <div className="bg-white p-4 rounded-lg shadow overflow-x-auto">
                    <DataTable
                        columns={columns}
                        data={data}
                        actions={actions}
                        excludeFields={["id"]} // Exclude id from being displayed in the table
                    />
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default SubKegiatanIndex;
