import { useCallback, useEffect, useRef, useState } from "react"
import { customerServices } from "../services/customerServices";
import { Column } from 'primereact/column';
import { DataTable } from 'primereact/datatable';
import { Tooltip } from 'primereact/tooltip';
import { Toast } from 'primereact/toast';
import { Button } from "primereact/button";
import moment from "moment";
import { Badge } from "primereact/badge";

export const CustomerResetPasswordTable = ({ customerId }) => {
    const [loading, setLoading] = useState(false);
    const [resetPasswordList, setResetPasswordList] = useState([]);
    const [id, setId] = useState(customerId);

    const params = useRef(null);
    const smsToast = useRef(null);

    const columns = [
        { field: 'phone_no', header: 'Phone Number', show: true, width: "150px", frozen: false },
        { field: 'customer_type', header: 'Customer Type', show: true, width: "150px", frozen: false },
        { field: 'customer_name', header: 'Customer Name', show: true, width: "150px", frozen: false },
        { field: 'password', header: 'Password', show: true, width: "150px", frozen: false },
        { field: 'hash_password', header: 'Hash Password', show: true, width: "600px", frozen: false },
        { field: 'sms_status', header: 'SMS Status', show: true, width: "200px", frozen: false },
        { field: 'created_at', header: 'Created At', show: true, width: "200px", frozen: false },
        { field: 'updated_at', header: 'Updated At', show: true, width: "200px", frozen: false },
        { field: 'operation', header: 'Operation', show: true, width: "100px", frozen: true },
    ];

    const sendSMS = async (content) => {
        setLoading(true);
        const result = await customerServices.sendResetPassword(content.id);
        if (result.status === 201 || result.status === 200) {
            smsToast.current.show({ severity: 'success', summary: 'Confirmed', detail: "Reset password is send successfully", life: 3000 });
        }
        await mount();
        setLoading(false);
    }

    const mount = useCallback(async () => {
        if (customerId) {
            setLoading(true);
            setId(customerId);
            const result = await customerServices.resetPasswordIndex(customerId, params.current);

            if (result.status === 200 || result.status === 201) {
                setResetPasswordList(result.data);
            }

            setLoading(false);
        }
    }, [customerId]);

    useEffect(() => {
        mount();
    }, [mount]);

    return (
        <>
            <div className="mb-3 mt-3 w-full flex-row align-items-end justify-content-end" style={{ display: "flex" }}>
                <Button
                    loading={loading}
                    severity="danger"
                    label="Refresh"
                    size="small"
                    icon={"pi pi-refresh"}
                    style={{ borderRadius: "5px" }}
                    onClick={() => mount()}
                />
            </div>

            {customerId && (
                <DataTable
                    value={resetPasswordList}
                    scrollable
                    scrollHeight="500px"
                >
                    <Column headerStyle={{ width: '3rem' }}></Column>
                    {columns.map((col, index) => {
                        return (
                            <Column
                                key={`reset_password_${col.field}_${index}`}
                                field={col.field}
                                header={col.header}
                                frozen={col.frozen ?? false}
                                alignFrozen={col.alignFrozen ?? "right"}
                                style={col.width ? { minWidth: `${col.width}` } : ""}
                                body={(content) => {
                                    switch (col.field) {
                                        case "created_at":
                                            return (
                                                <span> {moment(content[col.field]).format("MM/DD/YYYY hh:mm:ss A")} </span>
                                            );
                                        case "updated_at":
                                            return (
                                                <span> {moment(content[col.field]).format("MM/DD/YYYY hh:mm:ss A")} </span>
                                            );
                                        case "sms_status":
                                            return (
                                                <Badge
                                                    value={content[col.field]}
                                                    severity={content[col.field] === 'PENDING' ? "warning" : content[col.field] === 'SUCCESS' ? "success" : "danger" }
                                                />
                                            )
                                        case "operation":
                                            return (
                                                <div className='btn-group'>
                                                    {(content['sms_status'] === 'PENDING' || content['sms_status'] === 'FAIL') && (
                                                        <div className='tooltip-btn' onClick={() => sendSMS(content)}>
                                                            <Tooltip target=".pi-send" content="Send SMS" position="top" event="hover" />
                                                            <i className='pi pi-send' style={{ color: "#17A2B8" }}></i>
                                                        </div>
                                                    )}
                                                </div>
                                            )
                                        default:
                                            return content[col.field];
                                    }
                                }
                                }
                            />
                        )
                    })}
                </DataTable>
            )}
            <Toast ref={smsToast} />
        </>
    )
}