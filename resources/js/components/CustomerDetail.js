import React, { useCallback, useEffect, useRef, useState } from "react";
import ReactDOM from 'react-dom/client';
import { TabView, TabPanel } from 'primereact/tabview';
import { getRequest, updateRequest } from "../helpers/axios";
import { endpoints } from "../constants";
import { ProfileUpload } from "../shares/ProfileUpload";
import { InputText } from "primereact/inputtext";
import { Card } from 'primereact/card';
import { Dropdown } from 'primereact/dropdown';
import { Badge } from 'primereact/badge';
import { payloadHandler } from "../helpers/utilities";
import { Button } from "primereact/button";
import { CoreCustomerDetail } from "./CoreCustomerDetail";
import { EmployeeCustomerDetail } from "./EmployeeCustomerDetail";
import { AgentCustomerDetail } from "./AgentCustomerDetail";
import { CustomerAccountCode } from "./CustomerAccountCode";
import { Toast } from 'primereact/toast';
import { CustomerResetPassword } from "./CustomerResetPassword";
import moment from "moment";

export const CustomerDetail = () => {

    const [customer, setCustomer] = useState(null);
    const [payload, setPayload] = useState(null);
    const [loading, setLoading] = useState(false);
    const [activeIndex, setActiveIndex] = useState(0);
    const [selectedUser, setSelectedUser] = useState(null);
    const [users, setUser] = useState([]);

    const id = useRef(window.location.pathname.split("/")[3]);
    const toast = useRef(null);

    /** Update Customer */
    const updateCustomerProfile = async () => {
        setLoading(true);
        const formData = new FormData();

        if (payload.profile_photo !== "") {
            formData.append('profile_photo', payload.profile_photo);
        }

        if (customer.app_customer_type === 'GROUP') {
            formData.append('user_id', selectedUser.code);
        }

        formData.append('user_name', payload.user_name ?? "");
        formData.append('customer_code', payload.customer_code ?? "");
        formData.append('customer_phoneno', payload.customer_phoneno ?? "");
        formData.append('policy_number', payload.policy_number ?? "");
        formData.append('risk_seqNo', payload.risk_seqNo ?? "");
        formData.append('risk_name', payload.risk_name ?? "");
        formData.append('method', 'PUT');

        const result = await updateRequest(`${endpoints.customer}/${id.current}`, formData);

        if (result.status === 201 || result.status === 200) {
            const result = await getRequest(`${endpoints.customerDetail}/${id.current}`);
            if (result.status === 200 || result.status === 201) {
                const updatePayload = { ...result.data };
                updatePayload.profile_photo = "";
                updatePayload.risk_seqNo = result.data.risk_seqNo ?? "";
                updatePayload.risk_name = result.data.risk_name ?? "";
                setCustomer(result.data);
                setPayload(updatePayload);

                const selectedFilterUser = users.filter(e => e.code === result.data.user_id)[0];
                setSelectedUser(selectedFilterUser);

                toast.current.show({ severity: 'success', summary: 'Success', detail: "Record is updated successfully", life: 3000 });
            }
        }

        setLoading(false);
    }

    /** Initialization Loading Data  */
    const mount = useCallback(async () => {
        setLoading(true);

        const resultUser = await getRequest(`${endpoints.user}`);

        if (resultUser.status === 201 || resultUser.status === 200) {
            const userList = resultUser.data.map((value) => {
                return { name: value.name, code: value.id }
            })
            setUser(userList);
        }

        const result = await getRequest(`${endpoints.customerDetail}/${id.current}`);

        if (result.status === 200 || result.status === 201) {
            const updatePayload = { ...result.data };
            updatePayload.profile_photo = "";
            updatePayload.risk_seqNo = result.data.risk_seqNo ?? "";
            updatePayload.risk_name = result.data.risk_name ?? "";
            setCustomer(result.data);
            setPayload(updatePayload);

            const userFilter = resultUser.data.filter(e => e.id === updatePayload.user_id)[0];

            if (userFilter) {
                setSelectedUser({
                    name: userFilter.name, code: userFilter.id
                })
            }
        }

        setLoading(false);
    }, []);

    /** Mount Initialize Data */
    useEffect(() => {
        mount();
    }, [mount]);

    const CardTitle = () => {
        return (
            <div className="d-flex flex-row justify-content-between align-items-start">
                <h5 style={{ marginBottom: "0px" }}> Customer Account Information </h5>
                {customer && (
                    <div className="d-flex flex-row justify-content-start align-items-start">
                        <Badge value={customer.app_customer_type} />
                        <Badge
                            severity={Number(customer.is_disabled) === 0 ? 'success' : 'error'}
                            value={Number(customer.is_disabled) === 0 ? "ACTIVE" : "DISABLE"}
                            style={{ marginLeft: "10px" }}
                        />
                    </div>
                )}
            </div>
        )
    }

    const CardSubTitle = () => {
        return (
            <>
                <small> Created At - {moment().format("hh:mm:ss DD/MM/YYYY")}</small>
            </>
        )
    }

    return (
        <div className="row">
            {customer && (
                <div className="col-12">
                    <Card
                        title={CardTitle}
                        subTitle={CardSubTitle}
                    >
                        <div className="col-12 mt-3">
                            <div className="row">
                                <div className="col-12">
                                    <ProfileUpload
                                        loading={loading}
                                        preview={customer.profile_photo}
                                        onSelect={(e) => payloadHandler(payload, e, "profile_photo", (updatePayload) => {
                                            setPayload(updatePayload);
                                        })}
                                    />
                                </div>
                            </div>

                            <div className="row">
                                <div className="col-12 col-md-3 col-lg-3 mt-3">
                                    <div className="d-flex flex-column">
                                        <label className="label-text"> Username </label>
                                        <InputText
                                            placeholder="Enter user name"
                                            value={payload.user_name ?? ""}
                                            disabled={loading}
                                            onChange={(e) => payloadHandler(payload, e.target.value, "user_name", (updatePayload) => {
                                                setPayload(updatePayload);
                                            })}
                                        />
                                    </div>
                                </div>

                                <div className="col-12 col-md-3 col-lg-3 mt-3">
                                    <div className="d-flex flex-column">
                                        <label className="label-text"> Customer Code </label>
                                        <InputText
                                            placeholder="Enter Customer Code"
                                            value={payload.customer_code ?? ""}
                                            disabled={loading}
                                            onChange={(e) => payloadHandler(payload, e.target.value, "customer_code", (updatePayload) => {
                                                setPayload(updatePayload);
                                            })}
                                        />
                                    </div>
                                </div>

                                <div className="col-12 col-md-3 col-lg-3 mt-3">
                                    <div className="d-flex flex-column">
                                        <label className="label-text"> Customer Phone Number </label>
                                        <InputText
                                            placeholder="Enter Customer Phone Number"
                                            value={payload.customer_phoneno ?? ""}
                                            disabled={loading}
                                            onChange={(e) => payloadHandler(payload, e.target.value, "customer_phoneno", (updatePayload) => {
                                                setPayload(updatePayload);
                                            })}
                                        />
                                    </div>
                                </div>

                                <div className="col-12 col-md-3 col-lg-3 mt-3">
                                    <div className="d-flex flex-column">
                                        <label className="label-text"> Policy Number </label>
                                        <InputText
                                            placeholder="Enter Policy Number"
                                            value={payload.policy_number ?? ""}
                                            disabled={loading}
                                            onChange={(e) => payloadHandler(payload, e.target.value, "policy_number", (updatePayload) => {
                                                setPayload(updatePayload);
                                            })}
                                        />
                                    </div>
                                </div>

                                <div className="col-12 col-md-6 col-lg-6 mt-3">
                                    <div className="d-flex flex-column">
                                        <label className="label-text"> Risk Seq No. </label>
                                        <InputText
                                            placeholder="Enter Risk Seq No."
                                            value={payload.risk_seqNo ?? ""}
                                            disabled={loading}
                                            onChange={(e) => payloadHandler(payload, e.target.value, "risk_seqNo", (updatePayload) => {
                                                setPayload(updatePayload);
                                            })}
                                        />
                                    </div>
                                </div>

                                <div className="col-12 col-md-6 col-lg-6 mt-3">
                                    <div className="d-flex flex-column">
                                        <label className="label-text"> Risk Name </label>
                                        <InputText
                                            placeholder="Enter Risk Name"
                                            value={payload.risk_name ?? ""}
                                            disabled={loading}
                                            onChange={(e) => payloadHandler(payload, e.target.value, "risk_name", (updatePayload) => {
                                                setPayload(updatePayload);
                                            })}
                                        />
                                    </div>
                                </div>

                                {users.length > 0 && customer.app_customer_type === 'GROUP' && (
                                    <div className="col-12 col-md-6 col-lg-6 mt-3">
                                        <div className="d-flex flex-column">
                                            <label className="label-text"> Choose User </label>
                                            <Dropdown
                                                options={users}
                                                value={selectedUser ? selectedUser : ""}
                                                optionLabel="name"
                                                placeholder="Select a User Account"
                                                className="w-full"
                                                onChange={(e) => {
                                                    payloadHandler(payload, e.value, 'user_id', (updatePayload) => {
                                                        setSelectedUser(e.value);
                                                        setPayload(updatePayload)
                                                    })
                                                }}
                                            />
                                        </div>
                                    </div>
                                )}

                                <div className="col-12 mt-3">
                                    <div className="d-flex flex-row justify-content-end align-items-center">
                                        <Button
                                            severity="danger"
                                            label="Update"
                                            size="small"
                                            style={{ borderRadius: "5px" }}
                                            disabled={loading}
                                            loading={loading}
                                            onClick={() => updateCustomerProfile()}
                                        />
                                    </div>
                                </div>
                            </div>

                            <div className="row">
                                <div className="col-12 mt-3">
                                    <TabView activeIndex={activeIndex} onTabChange={(e) => setActiveIndex(e.index)}>
                                        {customer && customer.account_codes && (
                                            <TabPanel header="Account Code">
                                                <CustomerAccountCode
                                                    dataSource={customer.account_codes}
                                                />
                                            </TabPanel>
                                        )}

                                        {customer && customer.core !== null && (
                                            <TabPanel header="Core Information">
                                                <CoreCustomerDetail
                                                    dataSource={customer.core}
                                                />
                                            </TabPanel>
                                        )}

                                        {customer && customer.employee_info !== null && (
                                            <TabPanel header="Employee Information">
                                                <EmployeeCustomerDetail
                                                    dataSource={customer.employee_info}
                                                />
                                            </TabPanel>
                                        )}

                                        {customer && customer.agent_info !== null && (
                                            <TabPanel header="Agent Information">
                                                <AgentCustomerDetail
                                                    dataSource={customer.agent_info}
                                                />
                                            </TabPanel>
                                        )}
{/* 
                                        {customer && (
                                            <TabPanel header="Send Notification">
                                                <CustomerSendNotification
                                                    dataSource={customer.agent_info}
                                                />
                                            </TabPanel>
                                        )} */}

                                        {customer && (
                                            <TabPanel header="Reset Password">
                                                <CustomerResetPassword dataSource={customer}/>
                                            </TabPanel>
                                        )}
                                    </TabView>
                                </div>
                            </div>
                        </div>
                    </Card>
                </div >
            )}

            <Toast ref={toast} />
        </div >
    )
}

if (document.getElementById('customer-detail')) {
    const root = ReactDOM.createRoot(document.getElementById('customer-detail'));
    root.render(<CustomerDetail />);
}