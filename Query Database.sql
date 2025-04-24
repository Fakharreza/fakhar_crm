--
-- PostgreSQL database dump
--

-- Dumped from database version 14.17
-- Dumped by pg_dump version 14.17

-- Started on 2025-04-24 10:11:22

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3402 (class 1262 OID 16561)
-- Name: fakhar_crm; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE fakhar_crm WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'en-US';


ALTER DATABASE fakhar_crm OWNER TO postgres;

\connect fakhar_crm

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 16655)
-- Name: customers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.customers (
    id_customers integer NOT NULL,
    id_leads integer,
    start_date date,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.customers OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16654)
-- Name: customers_id_customers_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.customers_id_customers_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.customers_id_customers_seq OWNER TO postgres;

--
-- TOC entry 3403 (class 0 OID 0)
-- Dependencies: 217
-- Name: customers_id_customers_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.customers_id_customers_seq OWNED BY public.customers.id_customers;


--
-- TOC entry 212 (class 1259 OID 16600)
-- Name: leads; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.leads (
    id_leads integer NOT NULL,
    name character varying(100) NOT NULL,
    email character varying(100),
    phone character varying(20),
    address text,
    created_by integer,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.leads OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 16599)
-- Name: leads_id_leads_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.leads_id_leads_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.leads_id_leads_seq OWNER TO postgres;

--
-- TOC entry 3404 (class 0 OID 0)
-- Dependencies: 211
-- Name: leads_id_leads_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.leads_id_leads_seq OWNED BY public.leads.id_leads;


--
-- TOC entry 214 (class 1259 OID 16618)
-- Name: products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products (
    id_products integer NOT NULL,
    name character varying(100) NOT NULL,
    description text,
    price numeric(12,2) NOT NULL,
    bandwidth character varying(50),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.products OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 16617)
-- Name: products_id_products_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_id_products_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_id_products_seq OWNER TO postgres;

--
-- TOC entry 3405 (class 0 OID 0)
-- Dependencies: 213
-- Name: products_id_products_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_id_products_seq OWNED BY public.products.id_products;


--
-- TOC entry 216 (class 1259 OID 16629)
-- Name: projects; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.projects (
    id_projects integer NOT NULL,
    id_leads integer,
    id_sales integer,
    id_manager integer,
    status character varying(20) DEFAULT 'pending'::character varying,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT projects_status_check CHECK (((status)::text = ANY ((ARRAY['pending'::character varying, 'approved'::character varying, 'rejected'::character varying])::text[])))
);


ALTER TABLE public.projects OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 16628)
-- Name: projects_id_projects_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.projects_id_projects_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.projects_id_projects_seq OWNER TO postgres;

--
-- TOC entry 3406 (class 0 OID 0)
-- Dependencies: 215
-- Name: projects_id_projects_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.projects_id_projects_seq OWNED BY public.projects.id_projects;


--
-- TOC entry 222 (class 1259 OID 16684)
-- Name: transaction_details; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transaction_details (
    id_transaction_details integer NOT NULL,
    id_transactions integer,
    id_products integer,
    quantity integer DEFAULT 1,
    price numeric(12,2),
    subtotal numeric(12,2),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.transaction_details OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16683)
-- Name: transaction_details_id_transaction_details_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.transaction_details_id_transaction_details_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.transaction_details_id_transaction_details_seq OWNER TO postgres;

--
-- TOC entry 3407 (class 0 OID 0)
-- Dependencies: 221
-- Name: transaction_details_id_transaction_details_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.transaction_details_id_transaction_details_seq OWNED BY public.transaction_details.id_transaction_details;


--
-- TOC entry 220 (class 1259 OID 16669)
-- Name: transactions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transactions (
    id_transactions integer NOT NULL,
    id_customers integer,
    transaction_date timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    total_amount numeric(12,2),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.transactions OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16668)
-- Name: transactions_id_transactions_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.transactions_id_transactions_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.transactions_id_transactions_seq OWNER TO postgres;

--
-- TOC entry 3408 (class 0 OID 0)
-- Dependencies: 219
-- Name: transactions_id_transactions_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.transactions_id_transactions_seq OWNED BY public.transactions.id_transactions;


--
-- TOC entry 210 (class 1259 OID 16588)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id_users integer NOT NULL,
    name character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(255) NOT NULL,
    role character varying(10) NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT users_role_check CHECK (((role)::text = ANY ((ARRAY['sales'::character varying, 'manager'::character varying])::text[])))
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 16587)
-- Name: users_id_users_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_users_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_users_seq OWNER TO postgres;

--
-- TOC entry 3409 (class 0 OID 0)
-- Dependencies: 209
-- Name: users_id_users_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_users_seq OWNED BY public.users.id_users;


--
-- TOC entry 3209 (class 2604 OID 16658)
-- Name: customers id_customers; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers ALTER COLUMN id_customers SET DEFAULT nextval('public.customers_id_customers_seq'::regclass);


--
-- TOC entry 3198 (class 2604 OID 16603)
-- Name: leads id_leads; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.leads ALTER COLUMN id_leads SET DEFAULT nextval('public.leads_id_leads_seq'::regclass);


--
-- TOC entry 3201 (class 2604 OID 16621)
-- Name: products id_products; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products ALTER COLUMN id_products SET DEFAULT nextval('public.products_id_products_seq'::regclass);


--
-- TOC entry 3204 (class 2604 OID 16632)
-- Name: projects id_projects; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects ALTER COLUMN id_projects SET DEFAULT nextval('public.projects_id_projects_seq'::regclass);


--
-- TOC entry 3216 (class 2604 OID 16687)
-- Name: transaction_details id_transaction_details; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaction_details ALTER COLUMN id_transaction_details SET DEFAULT nextval('public.transaction_details_id_transaction_details_seq'::regclass);


--
-- TOC entry 3212 (class 2604 OID 16672)
-- Name: transactions id_transactions; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions ALTER COLUMN id_transactions SET DEFAULT nextval('public.transactions_id_transactions_seq'::regclass);


--
-- TOC entry 3194 (class 2604 OID 16591)
-- Name: users id_users; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id_users SET DEFAULT nextval('public.users_id_users_seq'::regclass);


--
-- TOC entry 3392 (class 0 OID 16655)
-- Dependencies: 218
-- Data for Name: customers; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.customers (id_customers, id_leads, start_date, created_at, updated_at) VALUES (1, 1, '2025-04-01', '2025-04-23 12:39:52.855197', '2025-04-23 12:39:52.855197');
INSERT INTO public.customers (id_customers, id_leads, start_date, created_at, updated_at) VALUES (2, 2, '2025-04-02', '2025-04-23 12:39:52.855197', '2025-04-23 12:39:52.855197');
INSERT INTO public.customers (id_customers, id_leads, start_date, created_at, updated_at) VALUES (3, 6, '2025-04-23', '2025-04-23 14:05:31', '2025-04-23 14:05:31');
INSERT INTO public.customers (id_customers, id_leads, start_date, created_at, updated_at) VALUES (4, 7, '2025-04-23', '2025-04-23 14:05:58', '2025-04-23 14:05:58');


--
-- TOC entry 3386 (class 0 OID 16600)
-- Dependencies: 212
-- Data for Name: leads; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.leads (id_leads, name, email, phone, address, created_by, created_at, updated_at) VALUES (1, 'Lead 1', 'lead1@example.com', '1234567890', 'Address 1', 1, '2025-04-23 12:39:52.855197', '2025-04-23 12:39:52.855197');
INSERT INTO public.leads (id_leads, name, email, phone, address, created_by, created_at, updated_at) VALUES (2, 'Lead 2', 'lead2@example.com', '0987654321', 'Address 2', 1, '2025-04-23 12:39:52.855197', '2025-04-23 12:39:52.855197');
INSERT INTO public.leads (id_leads, name, email, phone, address, created_by, created_at, updated_at) VALUES (3, 'Lead 3', 'lead3@example.com', '1122334455', 'Address 3', 2, '2025-04-23 12:39:52.855197', '2025-04-23 12:39:52.855197');
INSERT INTO public.leads (id_leads, name, email, phone, address, created_by, created_at, updated_at) VALUES (6, 'newLead', 'newLead@example.com', '123456', 'address', 4, '2025-04-23 08:57:13', '2025-04-23 08:57:13');
INSERT INTO public.leads (id_leads, name, email, phone, address, created_by, created_at, updated_at) VALUES (7, 'newLead2', 'newLead2@example.com', '123456', 'addressnewLead2', 2, '2025-04-23 13:41:01', '2025-04-23 13:41:01');


--
-- TOC entry 3388 (class 0 OID 16618)
-- Dependencies: 214
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.products (id_products, name, description, price, bandwidth, created_at, updated_at) VALUES (1, 'Product 1', 'deskripsi 1', 100.00, '10 Mbps', '2025-04-23 12:39:52.855197', '2025-04-23 12:39:52.855197');
INSERT INTO public.products (id_products, name, description, price, bandwidth, created_at, updated_at) VALUES (2, 'Product 2', 'deskripsi 2', 200.00, '50 Mbps', '2025-04-23 12:39:52.855197', '2025-04-23 12:39:52.855197');
INSERT INTO public.products (id_products, name, description, price, bandwidth, created_at, updated_at) VALUES (3, 'Product 3', 'deskripsi 3', 300.00, '100 Mbps', '2025-04-23 12:39:52.855197', '2025-04-23 12:39:52.855197');


--
-- TOC entry 3390 (class 0 OID 16629)
-- Dependencies: 216
-- Data for Name: projects; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.projects (id_projects, id_leads, id_sales, id_manager, status, created_at, updated_at) VALUES (1, 1, 1, 2, 'pending', '2025-04-23 12:39:52.855197', '2025-04-23 12:39:52.855197');
INSERT INTO public.projects (id_projects, id_leads, id_sales, id_manager, status, created_at, updated_at) VALUES (2, 2, 1, 2, 'approved', '2025-04-23 12:39:52.855197', '2025-04-23 12:39:52.855197');
INSERT INTO public.projects (id_projects, id_leads, id_sales, id_manager, status, created_at, updated_at) VALUES (3, 3, 1, 2, 'rejected', '2025-04-23 12:39:52.855197', '2025-04-23 12:39:52.855197');
INSERT INTO public.projects (id_projects, id_leads, id_sales, id_manager, status, created_at, updated_at) VALUES (4, 6, 1, 2, 'approved', '2025-04-23 13:38:21', '2025-04-23 14:05:31');
INSERT INTO public.projects (id_projects, id_leads, id_sales, id_manager, status, created_at, updated_at) VALUES (6, 7, 4, 2, 'approved', '2025-04-23 14:05:44', '2025-04-23 14:05:58');


--
-- TOC entry 3396 (class 0 OID 16684)
-- Dependencies: 222
-- Data for Name: transaction_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.transaction_details (id_transaction_details, id_transactions, id_products, quantity, price, subtotal, created_at, updated_at) VALUES (19, 23, 1, 1, 100.00, 100.00, '2025-04-23 14:14:31', '2025-04-23 14:14:31');


--
-- TOC entry 3394 (class 0 OID 16669)
-- Dependencies: 220
-- Data for Name: transactions; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.transactions (id_transactions, id_customers, transaction_date, total_amount, created_at, updated_at) VALUES (23, 4, '2025-04-23 21:14:31.749069', 100.00, '2025-04-23 14:14:31', '2025-04-23 14:14:31');


--
-- TOC entry 3384 (class 0 OID 16588)
-- Dependencies: 210
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users (id_users, name, email, password, role, created_at, updated_at) VALUES (1, 'reza', 'reza@example.com', '$2y$12$TH.v/F4AbQXzMqLKU8s.Ce8AibjzMbZWeBoAXgo3cjtppEnK6k.Xm', 'sales', '2025-04-23 12:39:52.855197', '2025-04-23 06:00:52');
INSERT INTO public.users (id_users, name, email, password, role, created_at, updated_at) VALUES (2, 'ferin', 'ferin@example.com', '$2y$12$0M7M87Sk24IWw44u9QV5v.Wyc87BHBd3.XzneMHY/VFXcHxoW/I.e', 'manager', '2025-04-23 12:39:52.855197', '2025-04-23 06:01:24');
INSERT INTO public.users (id_users, name, email, password, role, created_at, updated_at) VALUES (4, 'user3', 'user3@example.com', '$2y$12$9hxe/ay/kfSaaUxHyFE4ruXtQrFQdezapVKNh9Ae0gOeChU90nV9O', 'sales', '2025-04-23 08:46:47', '2025-04-23 08:46:47');


--
-- TOC entry 3410 (class 0 OID 0)
-- Dependencies: 217
-- Name: customers_id_customers_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.customers_id_customers_seq', 4, true);


--
-- TOC entry 3411 (class 0 OID 0)
-- Dependencies: 211
-- Name: leads_id_leads_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.leads_id_leads_seq', 7, true);


--
-- TOC entry 3412 (class 0 OID 0)
-- Dependencies: 213
-- Name: products_id_products_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_id_products_seq', 4, true);


--
-- TOC entry 3413 (class 0 OID 0)
-- Dependencies: 215
-- Name: projects_id_projects_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.projects_id_projects_seq', 6, true);


--
-- TOC entry 3414 (class 0 OID 0)
-- Dependencies: 221
-- Name: transaction_details_id_transaction_details_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.transaction_details_id_transaction_details_seq', 19, true);


--
-- TOC entry 3415 (class 0 OID 0)
-- Dependencies: 219
-- Name: transactions_id_transactions_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.transactions_id_transactions_seq', 23, true);


--
-- TOC entry 3416 (class 0 OID 0)
-- Dependencies: 209
-- Name: users_id_users_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_users_seq', 4, true);


--
-- TOC entry 3231 (class 2606 OID 16662)
-- Name: customers customers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers
    ADD CONSTRAINT customers_pkey PRIMARY KEY (id_customers);


--
-- TOC entry 3225 (class 2606 OID 16611)
-- Name: leads leads_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.leads
    ADD CONSTRAINT leads_pkey PRIMARY KEY (id_leads);


--
-- TOC entry 3227 (class 2606 OID 16627)
-- Name: products products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id_products);


--
-- TOC entry 3229 (class 2606 OID 16638)
-- Name: projects projects_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_pkey PRIMARY KEY (id_projects);


--
-- TOC entry 3235 (class 2606 OID 16690)
-- Name: transaction_details transaction_details_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaction_details
    ADD CONSTRAINT transaction_details_pkey PRIMARY KEY (id_transaction_details);


--
-- TOC entry 3233 (class 2606 OID 16677)
-- Name: transactions transactions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions
    ADD CONSTRAINT transactions_pkey PRIMARY KEY (id_transactions);


--
-- TOC entry 3221 (class 2606 OID 16598)
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- TOC entry 3223 (class 2606 OID 16596)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_users);


--
-- TOC entry 3240 (class 2606 OID 16663)
-- Name: customers customers_id_leads_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers
    ADD CONSTRAINT customers_id_leads_fkey FOREIGN KEY (id_leads) REFERENCES public.leads(id_leads);


--
-- TOC entry 3236 (class 2606 OID 16612)
-- Name: leads leads_created_by_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.leads
    ADD CONSTRAINT leads_created_by_fkey FOREIGN KEY (created_by) REFERENCES public.users(id_users);


--
-- TOC entry 3237 (class 2606 OID 16639)
-- Name: projects projects_id_leads_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_id_leads_fkey FOREIGN KEY (id_leads) REFERENCES public.leads(id_leads);


--
-- TOC entry 3239 (class 2606 OID 16649)
-- Name: projects projects_id_manager_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_id_manager_fkey FOREIGN KEY (id_manager) REFERENCES public.users(id_users);


--
-- TOC entry 3238 (class 2606 OID 16644)
-- Name: projects projects_id_sales_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_id_sales_fkey FOREIGN KEY (id_sales) REFERENCES public.users(id_users);


--
-- TOC entry 3243 (class 2606 OID 16696)
-- Name: transaction_details transaction_details_id_products_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaction_details
    ADD CONSTRAINT transaction_details_id_products_fkey FOREIGN KEY (id_products) REFERENCES public.products(id_products);


--
-- TOC entry 3242 (class 2606 OID 16691)
-- Name: transaction_details transaction_details_id_transactions_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaction_details
    ADD CONSTRAINT transaction_details_id_transactions_fkey FOREIGN KEY (id_transactions) REFERENCES public.transactions(id_transactions);


--
-- TOC entry 3241 (class 2606 OID 16678)
-- Name: transactions transactions_id_customers_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions
    ADD CONSTRAINT transactions_id_customers_fkey FOREIGN KEY (id_customers) REFERENCES public.customers(id_customers);


-- Completed on 2025-04-24 10:11:22

--
-- PostgreSQL database dump complete
--

