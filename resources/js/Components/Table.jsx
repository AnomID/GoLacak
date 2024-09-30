import React from "react";
import { Link } from "@inertiajs/react";

const Table = ({ bulan, handleDelete }) => {
    return (
        <table className="min-w-full table-auto bg-[#FCFAEE] shadow-md rounded">
            <thead className="bg-[#507687] text-white">
                <tr>
                    {/* Kolom Bulan dengan lebar 1/3 */}
                    <th className="px-4 py-2 text-left border-r border-gray-400 w-1/3">
                        Bulan
                    </th>
                    {/* Kolom Actions dengan lebar 2/3 */}
                    <th className="px-4 py-2 w-2/3">
                        <div className="flex justify-end pr-8">Actions</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                {bulan.map((item) => (
                    <tr key={item.id} className="border-b hover:bg-[#FCFAEE]">
                        {/* Kolom Bulan dengan lebar 1/3 */}
                        <td className="px-4 py-2 text-[#384B70] border-r border-gray-400 w-1/3">
                            {item.bulan}
                        </td>

                        {/* Kolom Actions dengan lebar 2/3 */}
                        <td className="px-4 py-2 w-2/3">
                            {/* Pada layar kecil, tombol akan tersusun vertikal */}
                            <div className="flex flex-col sm:flex-row sm:justify-end gap-2">
                                {/* View Details Button */}
                                <Link
                                    href={route("admin.bulan.tampil", item.id)}
                                    className="bg-[#384B70] text-white py-1 px-3 rounded hover:bg-[#507687] transition duration-300 text-sm inline-flex justify-center items-center"
                                >
                                    View Details
                                </Link>

                                {/* Link to Programs Page */}
                                <Link
                                    href={route("program.index", item.id)}
                                    className="bg-[#507687] text-white py-1 px-3 rounded hover:bg-[#384B70] transition duration-300 text-sm inline-flex justify-center items-center"
                                >
                                    View Programs
                                </Link>

                                {/* Edit Button */}
                                <Link
                                    href={route("admin.bulan.edit", item.id)}
                                    className="bg-red-600 text-white py-1 px-3 rounded hover:bg-[#B8001F] transition duration-300 text-sm inline-flex justify-center items-center"
                                >
                                    Edit
                                </Link>

                                {/* Delete Button */}
                                <button
                                    onClick={() => handleDelete(item.id)}
                                    className="bg-[#B8001F] text-white py-1 px-3 rounded hover:bg-red-600 transition duration-300 text-sm inline-flex justify-center items-center"
                                >
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
