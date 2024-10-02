import React from "react";
import { Link } from "@inertiajs/inertia-react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import UserTable from "@/Components/UserTable"; // Import the new UserTable component

const UserBulanIndex = ({ bulan, auth }) => {
    return (
        <AuthenticatedLayout user={auth.user}>
            <div className="container mx-auto p-4 sm:p-6 lg:p-8 bg-[#FCFAEE] min-h-screen">
                <h1 className="text-2xl font-bold mb-6 text-[#384B70]">
                    Data Bulan
                </h1>

                <div className="mb-6">
                    <Link
                        href={route("user.bulan.viewAll")}
                        className="bg-[#507687] text-white py-2 px-4 rounded hover:bg-[#384B70] transition duration-300"
                    >
                        Lihat Semua
                    </Link>
                </div>

                <div className="bg-white p-4 rounded-lg shadow overflow-x-auto">
                    <UserTable bulan={bulan} />
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default UserBulanIndex;
