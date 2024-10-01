import React from "react";
import { Link } from "@inertiajs/inertia-react";
import Program from "@/Components/Program"; // Import the Program component correctly
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout"; // Import AuthenticatedLayout

const BulanDetail = ({ bulan, auth }) => {
    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <h1 className="text-xl sm:text-2xl font-bold mb-6 text-[#384B70]">
                    Data Semua Bulan
                </h1>
                <Link
                    href={route("admin.bulan.index")}
                    className="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition duration-300 mb-4"
                >
                    Kembali ke Daftar Bulan
                </Link>

                {/* Display each bulan with its programs, kegiatans, and sub-kegiatans */}
                {bulan.map((item) => (
                    <div
                        key={item.id}
                        className="mt-6 p-6 bg-white border border-gray-300 rounded-lg shadow-lg space-y-6"
                        style={{ borderTop: "4px solid #507687" }} // Adds a thicker top border
                    >
                        <h2 className="text-xl sm:text-3xl font-bold text-[#384B70]">
                            {item.bulan}
                        </h2>
                        <div className="ml-2 sm:ml-4 space-y-4">
                            {item.programs && item.programs.length > 0 ? (
                                item.programs.map((program) => (
                                    <div key={program.id} className="mb-4">
                                        {" "}
                                        {/* Added margin-bottom for spacing */}
                                        <Program program={program} />
                                    </div>
                                ))
                            ) : (
                                <p className="text-sm sm:text-base">
                                    No Programs available
                                </p>
                            )}
                        </div>
                    </div>
                ))}
            </div>
        </AuthenticatedLayout>
    );
};

export default BulanDetail;
