import React, { useState, useEffect } from "react";
import axios from "axios";
import { Tab, Tabs, TabList, TabPanel } from "react-tabs";
import "react-tabs/style/react-tabs.css";

const BulanTabs = () => {
    const [bulanData, setBulanData] = useState([]);

    useEffect(() => {
        // Fetch data dari endpoint API untuk mendapatkan data bulan beserta program, kegiatan, dan sub-kegiatan
        axios
            .get("/api/bulan")
            .then((response) => {
                setBulanData(response.data);
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
    }, []);

    return (
        <div>
            <h1>Daftar Bulan dan Program</h1>
            {bulanData.length === 0 ? (
                <p>Loading data...</p>
            ) : (
                <Tabs>
                    <TabList>
                        {bulanData.map((bulan) => (
                            <Tab key={bulan.id}>{bulan.nama_bulan}</Tab>
                        ))}
                    </TabList>

                    {bulanData.map((bulan) => (
                        <TabPanel key={bulan.id}>
                            <h2>{bulan.nama_bulan}</h2>

                            {bulan.programs.map((program) => (
                                <div key={program.id}>
                                    <h3>Program: {program.nama_program}</h3>
                                    <p>Indikator: {program.nama_indikator}</p>

                                    {program.kegiatans.map((kegiatan) => (
                                        <div
                                            key={kegiatan.id}
                                            style={{ marginLeft: "20px" }}
                                        >
                                            <h4>
                                                Kegiatan:{" "}
                                                {kegiatan.nama_kegiatan}
                                            </h4>
                                            <p>
                                                Indikator:{" "}
                                                {kegiatan.nama_indikator}
                                            </p>

                                            {kegiatan.sub_kegiatans.map(
                                                (subKegiatan) => (
                                                    <div
                                                        key={subKegiatan.id}
                                                        style={{
                                                            marginLeft: "40px",
                                                        }}
                                                    >
                                                        <h5>
                                                            Sub Kegiatan:{" "}
                                                            {
                                                                subKegiatan.nama_sub_kegiatan
                                                            }
                                                        </h5>
                                                        <p>
                                                            Indikator:{" "}
                                                            {
                                                                subKegiatan.nama_indikator
                                                            }
                                                        </p>
                                                    </div>
                                                )
                                            )}
                                        </div>
                                    ))}
                                </div>
                            ))}
                        </TabPanel>
                    ))}
                </Tabs>
            )}
        </div>
    );
};

export default BulanTabs;
