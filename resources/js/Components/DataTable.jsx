import React from "react";

const DataTable = ({ columns, data, actions, excludeFields = [] }) => {
    return (
        <div className="overflow-x-auto">
            <table className="min-w-full table-auto bg-white shadow-md rounded border border-gray-300">
                <thead className="bg-[#507687] text-white">
                    <tr>
                        {columns.map((column, index) => (
                            <th
                                key={index}
                                className="px-4 py-2 text-left border border-gray-400 text-sm"
                            >
                                {column}
                            </th>
                        ))}
                        <th className="px-4 py-2 text-center border border-gray-400 text-sm">
                            {" "}
                            {/* Centering the Actions header */}
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {data.length > 0 ? (
                        data.map((item) => (
                            <tr key={item.id} className="hover:bg-[#FCFAEE]">
                                {Object.entries(item).map(
                                    ([key, value], index) => {
                                        if (excludeFields.includes(key))
                                            return null; // Skip excluded fields
                                        return (
                                            <td
                                                key={index}
                                                className="px-4 py-2 text-[#384B70] border border-gray-300 text-sm"
                                            >
                                                {value}
                                            </td>
                                        );
                                    }
                                )}
                                <td className="px-4 py-2 border border-gray-300 text-center">
                                    {" "}
                                    {/* Centering the Actions column */}
                                    <div className="flex justify-center space-x-2">
                                        {" "}
                                        {/* Centering action buttons */}
                                        {actions(item)}
                                    </div>
                                </td>
                            </tr>
                        ))
                    ) : (
                        <tr>
                            <td
                                colSpan={columns.length + 1}
                                className="text-center py-4"
                            >
                                No data available.
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </div>
    );
};

export default DataTable;
