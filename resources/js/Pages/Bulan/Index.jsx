import React from "react";
import Table from "@/Components/Table";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

const BulanIndex = ({ bulan, auth }) => {
    const handleDelete = (id) => {
        if (confirm("Are you sure you want to delete this month?")) {
            Inertia.delete(route("admin.bulan.destroy", id));
        }
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <h1 className="text-2xl font-bold mb-6 text-[#384B70]">
                    Bulan
                </h1>

                {/* Tombol Add Bulan langsung tanpa komponen */}
                <div className="mb-6 flex space-x-2">
                    <a
                        href={route("admin.bulan.create")}
                        className="bg-[#B8001F] text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300"
                    >
                        Add Bulan
                    </a>
                    <a
                        href={route("admin.bulan.viewAll")}
                        className="bg-[#507687] text-white py-2 px-4 rounded hover:bg-[#384B70] transition duration-300"
                    >
                        View All
                    </a>
                </div>

                {/* Tabel responsive dengan scroll di mobile */}
                <div className="bg-white p-4 rounded-lg shadow overflow-x-auto">
                    <Table bulan={bulan} handleDelete={handleDelete} />
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default BulanIndex;
