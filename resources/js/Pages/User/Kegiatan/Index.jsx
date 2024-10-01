import React from "react";
import { Link } from "@inertiajs/react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import DataTable from "@/Components/DataTable"; // Import the new DataTable component

const KegiatanIndex = ({ kegiatan, program, auth }) => {
    // Define columns for the Kegiatan index
    const columns = [
        "Nama Kegiatan",
        "Anggaran Murni",
        "Pergeseran",
        "Perubahan",
        "Penyerapan Anggaran",
        "Persen Penyerapan Anggaran",
    ];

    // Prepare the data to include all relevant fields
    const data = kegiatan.map((keg) => ({
        nama_kegiatan: keg.nama_kegiatan,
        anggaran_murni: keg.anggaran_murni,
        pergeseran: keg.pergeseran,
        perubahan: keg.perubahan,
        penyerapan_anggaran: keg.penyerapan_anggaran,
        persen_penyerapan: `${keg.persen_penyerapan_anggaran}%`, // Add percentage sign for clarity
        id: keg.id,
    }));

    // Define actions for each kegiatan
    const actions = (keg) => (
        <>
            <Link
                href={route("user.subkegiatan.index", keg.id)}
                className="bg-[#507687] text-white py-1 px-3 rounded hover:bg-[#384B70] transition duration-300"
            >
                View Sub Kegiatan
            </Link>

            <Link
                href={route("user.kegiatan.edit-anggaran", keg.id)}
                className="bg-red-600 text-white py-1 px-3 rounded hover:bg-red-700 transition duration-300"
            >
                Update Anggaran
            </Link>
        </>
    );

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <header className="mb-6">
                    <h1 className="text-2xl font-bold text-[#384B70] mb-2">
                        Kegiatan for Program: {program.nama_program}
                    </h1>
                </header>

                <div className="mb-4 flex flex-col sm:flex-row sm:space-x-2">
                    <Link
                        href={route("user.program.index", program.id)}
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
