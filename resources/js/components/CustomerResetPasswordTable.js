import { useCallback, useEffect, useRef, useState } from "react"
import { customerServices } from "../services/customerServices";
import { Column } from 'primereact/column';
import { DataTable } from 'primereact/datatable';
import { Tooltip } from 'primereact/tooltip';
import moment from "moment";

export const CustomerResetPasswordTable = ({ customerId }) => {
    const [loading, setLoading] = useState(false);
    const [resetPasswordList, setResetPasswordList] = useState([]);
    const [id, setId] = useState(customerId);

    const params = useRef({
        page: 0,
        per_page: 10,
    });

    const columns = [
        { field: 'phone_no', header: 'Phone Number', show: true, width: "150px", frozen: false },
        { field: 'customer_type', header: 'Customer Type', show: true, width: "150px", frozen: false },
        { field: 'password', header: 'Password', show: true, width: "150px", frozen: false },
        { field: 'hash_password', header: 'Hash Password', show: true, width: "600px", frozen: false },
        { field: 'sms_status', header: 'SMS Status', show: true, width: "200px", frozen: false },
        { field: 'created_at', header: 'Created At', show: true, width: "200px", frozen: false },
        { field: 'updated_at', header: 'Updated At', show: true, width: "200px", frozen: false },
        { field: 'deleted_at', header: 'Deleted At', show: true, width: "200px", frozen: false },
        { field: 'operation', header: 'Operation', show: true, width: "200px", frozen: true },
    ]

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
                                        case "deleted_at":
                                            return (
                                                <span> {content[col.field] ? moment(content[col.field]).format("MM/DD/YYYY hh:mm:ss A") : ""} </span>
                                            );
                                        case "operation":
                                            return (
                                                <div className='btn-group'>
                                                    <div className='tooltip-btn' onClick={() => window.location.replace(`${baseURL}/admin/${endpoints.customer}/${content.id}`)}>
                                                        <Tooltip target=".pi-send" content="Send SMS" position="top" event="hover" />
                                                        <i className='pi pi-send' style={{ color: "#17A2B8" }}></i>
                                                    </div>

                                                    <div className='tooltip-btn' onClick={() => deleteRecordConfirm(content.id)}>
                                                        <Tooltip target=".pi-trash" content="Delete" position="top" event="hover" />
                                                        <i className='pi pi-trash' style={{ color: "#DC3545" }}></i>
                                                    </div>
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
        </>
    )
}