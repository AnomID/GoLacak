import React from "react";
import { Link } from "@inertiajs/inertia-react";
import Program from "@/Components/Program"; // Import the Program component correctly
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout"; // Import AuthenticatedLayout

const BulanShow = ({ bulan, auth }) => {
    // Calculate totals
    const totalAnggaranMurni = bulan.programs.reduce(
        (total, program) => total + (program.anggaran_murni || 0),
        0
    );

    const totalPergeseran = bulan.programs.reduce(
        (total, program) => total + (program.pergeseran || 0),
        0
    );

    const totalPerubahan = bulan.programs.reduce(
        (total, program) => total + (program.perubahan || 0),
        0
    );

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                {/* Back Button */}
                <Link
                    href={route("admin.bulan.index")}
                    className="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition duration-300 inline-block mb-4"
                >
                    Back to List
                </Link>

                <h1 className="text-xl sm:text-2xl font-bold mb-6 text-[#384B70]">
                    Rincian Bulan: {bulan.bulan}
                </h1>

                {/* Display Programs */}
                {bulan.programs.map((program) => (
                    <div
                        key={program.id}
                        className="mt-6 p-6 bg-white border border-gray-300 rounded-lg shadow-lg space-y-4"
                        style={{ borderTop: "4px solid #507687" }} // Adds a thicker top border for month sections
                    >
                        {/* Reuse Program Component */}
                        <Program program={program} />
                    </div>
                ))}

                {/* Display Totals */}
                <div className="mt-6 p-4 bg-white border border-gray-300 rounded-md shadow-md">
                    <h3 className="text-lg font-bold mb-3">Total Anggaran:</h3>
                    <p>
                        <strong>Anggaran Murni Total:</strong>{" "}
                        {totalAnggaranMurni}
                    </p>
                    <p>
                        <strong>Pergeseran Total:</strong> {totalPergeseran}
                    </p>
                    <p>
                        <strong>Perubahan Total:</strong> {totalPerubahan}
                    </p>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default BulanShow;
