import React from "react";
import { Link } from "@inertiajs/inertia-react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import DataTable from "@/Components/DataTable"; // Import the new DataTable component
import { ArrowsPointingInIcon, PencilIcon } from "@heroicons/react/24/solid"; // Import icons

const ProgramIndex = ({ programs, bulan, auth }) => {
    // Define columns including all necessary fields
    const columns = [
        "Nama Program",
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
    const data = programs.map((program) => ({
        nama_program: program.nama_program,
        nama_indikator: program.nama_indikator,
        jumlah_indikator: program.jumlah_indikator,
        tipe_indikator: program.tipe_indikator,
        anggaran_murni: program.anggaran_murni,
        pergeseran: program.pergeseran,
        perubahan: program.perubahan,
        penyerapan_anggaran: program.penyerapan_anggaran,
        persen_penyerapan: `${program.persen_penyerapan_anggaran}%`, // Add percentage sign for clarity
        id: program.id,
    }));

    // Define actions for each program
    const actions = (program) => (
        <div className="flex space-x-2">
            <Link
                href={route("user.kegiatan.index", program.id)}
                className="bg-[#507687] text-white py-2 px-4 rounded flex items-center text-xs hover:bg-[#384B70] transition duration-300"
            >
                <ArrowsPointingInIcon
                    className="h-6 w-6 mr-1"
                    aria-hidden="true"
                />{" "}
                {/* Increased size here */}
                View Kegiatan
            </Link>
            <Link
                href={route("user.program.edit-anggaran", program.id)}
                className="bg-red-600 text-white py-2 px-4 rounded flex items-center text-xs hover:bg-red-700 transition duration-300"
            >
                <PencilIcon className="h-6 w-6 mr-1" aria-hidden="true" />{" "}
                {/* Increased size here */}
                Update Anggaran
            </Link>
        </div>
    );

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <header className="mb-6">
                    <h1 className="text-2xl font-bold text-[#384B70]">
                        Bulan {bulan.bulan}
                    </h1>
                    <h2 className="text-2xl font-bold text-[#384B70]">
                        Daftar Program
                    </h2>
                </header>

                <div className="mb-4 flex flex-col sm:flex-row sm:space-x-2">
                    <Link
                        href={route("user.bulan.index")}
                        className="bg-[#B8001F] text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300 mb-2 sm:mb-0"
                    >
                        Kembali ke Daftar Bulan
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

export default ProgramIndex;
