import React from "react";

const FormInput = ({ label, value, onChange, error, type = "text", step }) => {
    return (
        <div className="mb-4">
            <label className="block text-gray-700 font-bold mb-1">
                {label}
            </label>
            <input
                type={type}
                value={value}
                onChange={onChange}
                className="border border-gray-300 p-2 w-full rounded"
                step={step}
            />
            {error && <div className="text-red-500 text-xs mt-1">{error}</div>}
        </div>
    );
};

export default FormInput;
