import React from "react";
import { Link } from "@inertiajs/inertia-react";

const UserBulanIndex = ({ bulan }) => {
    return (
        <div>
            <h1>Bulan</h1>
            <div style={{ marginBottom: "20px" }}>
                <Link
                    href={route("user.bulan.viewAll")}
                    className="btn btn-sm btn-primary"
                >
                    View All
                </Link>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {bulan.map((item) => (
                        <tr key={item.id}>
                            <td>{item.bulan}</td>
                            <td>
                                {/* View Details Button */}
                                <Link
                                    href={route("user.bulan.tampil", item.id)} // View details route
                                    className="btn btn-sm btn-info"
                                    style={{ marginRight: "5px" }}
                                >
                                    View Details
                                </Link>

                                {/* Link to Programs Page */}
                                <Link
                                    href={route("user.program.index", item.id)}
                                    className="btn btn-sm btn-secondary"
                                    style={{ marginRight: "5px" }}
                                >
                                    View Programs
                                </Link>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default UserBulanIndex;
