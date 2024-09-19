import React, { useState } from "react";
import { Link } from "@inertiajs/react";

const AdminDashboard = ({ user, months }) => {
    const [monthList, setMonthList] = useState(months);

    // Fungsi untuk menangani logout
    const handleLogout = () => {
        Link.post("/logout");
    };

    return (
        <div>
            <h1>Admin Dashboard</h1>
            <p>Welcome, {user.name}!</p>{" "}
            {/* Tampilkan user yang sedang login */}
            {/* Tombol Logout */}
            <button
                onClick={handleLogout}
                style={{
                    marginBottom: "20px",
                    backgroundColor: "red",
                    color: "white",
                    padding: "10px",
                }}
            >
                Logout
            </button>
            {/* List Data Bulan */}
            <h2>List of Months</h2>
            <ul>
                {monthList.map((month, index) => (
                    <li key={index}>{month}</li>
                ))}
            </ul>
            {/* Tombol untuk Input Bulan Baru */}
            <div>
                <Link href="/add-month">
                    <button
                        style={{
                            padding: "10px",
                            backgroundColor: "#4B5563",
                            color: "white",
                            marginTop: "20px",
                        }}
                    >
                        Input Bulan
                    </button>
                </Link>
            </div>
        </div>
    );
};

export default AdminDashboard;
