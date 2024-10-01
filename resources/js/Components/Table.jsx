import React from "react";
import { Link } from "@inertiajs/react";
import {
    EyeIcon,
    ArrowsPointingInIcon,
    PencilIcon,
    TrashIcon,
} from "@heroicons/react/24/solid";

const Table = ({ bulan, handleDelete }) => {
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
                                    href={route("admin.bulan.tampil", item.id)}
                                    className="bg-[#384B70] text-white py-1 px-3 rounded hover:bg-[#507687] transition duration-300 text-sm inline-flex justify-center items-center"
                                >
                                    <EyeIcon
                                        className="h-5 w-5 mr-1"
                                        aria-hidden="true"
                                    />
                                    View Details
                                </Link>

                                <Link
                                    href={route("program.index", item.id)}
                                    className="bg-[#507687] text-white py-1 px-3 rounded hover:bg-[#384B70] transition duration-300 text-sm inline-flex justify-center items-center"
                                >
                                    <ArrowsPointingInIcon
                                        className="h-5 w-5 mr-1"
                                        aria-hidden="true"
                                    />
                                    View Programs
                                </Link>

                                <Link
                                    href={route("admin.bulan.edit", item.id)}
                                    className="bg-red-600 text-white py-1 px-3 rounded hover:bg-[#B8001F] transition duration-300 text-sm inline-flex justify-center items-center"
                                >
                                    <PencilIcon
                                        className="h-5 w-5 mr-1"
                                        aria-hidden="true"
                                    />
                                    Edit
                                </Link>

                                <button
                                    onClick={() => handleDelete(item.id)}
                                    className="bg-[#B8001F] text-white py-1 px-3 rounded hover:bg-red-600 transition duration-300 text-sm inline-flex justify-center items-center"
                                >
                                    <TrashIcon
                                        className="h-5 w-5 mr-1"
                                        aria-hidden="true"
                                    />
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
};

export default Table;
