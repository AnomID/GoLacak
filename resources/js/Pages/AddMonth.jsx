import React, { useState } from "react";

const AddMonth = () => {
    const [newMonth, setNewMonth] = useState("");

    const handleSubmit = (e) => {
        e.preventDefault();
        // Lakukan post request ke backend untuk menyimpan bulan baru
        Link.post("/add-month", { newMonth });
    };

    return (
        <div>
            <h1>Add New Month</h1>
            <form onSubmit={handleSubmit}>
                <input
                    type="text"
                    value={newMonth}
                    onChange={(e) => setNewMonth(e.target.value)}
                    placeholder="Enter month"
                    required
                />
                <button type="submit">Submit</button>
            </form>
        </div>
    );
};

export default AddMonth;
