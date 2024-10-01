import React, { useState } from "react";
import Table from "@/Components/Table";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

const BulanIndex = ({ bulan, auth }) => {
    const [deleteId, setDeleteId] = useState(null);
    const [showModal, setShowModal] = useState(false);

    const handleDelete = (id) => {
        setDeleteId(id);
        setShowModal(true);
    };

    const confirmDelete = () => {
        Inertia.delete(route("admin.bulan.destroy", deleteId));
        setShowModal(false);
    };

    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <h1 className="text-2xl font-bold mb-6 text-[#384B70]">
                    Data Daftar Bulan
                </h1>

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

                <div className="bg-white p-4 rounded-lg shadow overflow-x-auto">
                    <Table bulan={bulan} handleDelete={handleDelete} />
                </div>

                {/* Modal for delete confirmation */}
                {showModal && (
                    <div className="fixed inset-0 flex items-center justify-center z-50">
                        <div className="bg-white rounded-lg shadow-lg p-6 w-96">
                            <h2 className="text-lg font-semibold mb-4">
                                Confirm Delete
                            </h2>
                            <p>Apakah kamu yakin ingin menghapus bulan ini ?</p>
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

export default BulanIndex;
