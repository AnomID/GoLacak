import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { EyeIcon, ArrowsPointingInIcon } from "@heroicons/react/24/solid";

const UserTable = ({ bulan }) => {
    return (
        <table className="min-w-full table-auto bg-[#FCFAEE] shadow-md rounded">
            <thead className="bg-[#507687] text-white">
                <tr>
                    <th className="px-4 py-2 text-left border-r border-gray-400 w-1/3">
                        Bulan
                    </th>
                    <th className="px-4 py-2 w-2/3">
                        <div className="flex justify-end pr-8">Actions</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                {bulan.map((item) => (
                    <tr key={item.id} className="border-b hover:bg-[#FCFAEE]">
                        <td className="px-4 py-2 text-[#384B70] border-r border-gray-400 w-1/3">
                            {item.bulan}
                        </td>
                        <td className="px-4 py-2 w-2/3">
                            <div className="flex flex-col sm:flex-row sm:justify-end gap-2">
                                <Link
                                    href={route("user.bulan.tampil", item.id)}
                                    className="bg-[#384B70] text-white py-1 px-3 rounded hover:bg-[#507687] transition duration-300 text-sm inline-flex justify-center items-center"
                                >
                                    <EyeIcon
                                        className="h-5 w-5 mr-1"
                                        aria-hidden="true"
                                    />
                                    View Details
                                </Link>

                                <Link
                                    href={route("user.program.index", item.id)}
                                    className="bg-[#507687] text-white py-1 px-3 rounded hover:bg-[#384B70] transition duration-300 text-sm inline-flex justify-center items-center"
                                >
                                    <ArrowsPointingInIcon
                                        className="h-5 w-5 mr-1"
                                        aria-hidden="true"
                                    />
                                    View Programs
                                </Link>
                            </div>
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
};

export default UserTable;
