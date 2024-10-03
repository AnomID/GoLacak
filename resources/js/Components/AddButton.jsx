import React from "react";
import { Link } from "@inertiajs/react";

const AddButton = ({ href, children }) => {
    return (
        <Link
            href={href}
            className="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition duration-300 ease-in-out"
        >
            {children}
        </Link>
    );
};

export default AddButton;
